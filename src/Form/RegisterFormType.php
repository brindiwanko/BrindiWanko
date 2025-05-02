<?php

declare(strict_types=1);

namespace App\Form;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Event\PostSubmitEvent;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegisterFormType extends AbstractType
{
    public function __construct(
        private UserPasswordHasherInterface $userPasswordHasher,
        private UserRepository $userRepository,
    ) {
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('email')
            ->add('agreeTerms', CheckboxType::class, [
                'mapped'      => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'You should agree to our terms.',
                    ]),
                ],
            ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'label'       => 'Password',
                'mapped'      => false,
                'attr'        => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min'        => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
            ->addEventListener(FormEvents::POST_SUBMIT, [$this, 'hashPassword'])
            ->addEventListener(FormEvents::POST_SUBMIT, [$this, 'assignAsAdminIfDatabaseHasNoAdmins'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }

    public function hashPassword(PostSubmitEvent $event): void
    {
        /* @var User $user */
        $user = $event->getData();

        /** @var string $plainPassword */
        $plainPassword  = $event->getForm()->get('plainPassword')->getData();
        $hashedPassword = $this->userPasswordHasher->hashPassword($user, $plainPassword);

        // encode the plain password
        $user->setPassword($hashedPassword);
    }

    public function assignAsAdminIfDatabaseHasNoAdmins(PostSubmitEvent $event): void
    {
        if ($this->userRepository->count(['roles' => 'ROLE_ADMIN']) > 0) {
            return;
        }

        /* @var User $user */
        $user = $event->getData();
        $user->setRoles(['ROLE_ADMIN']);
    }
}
