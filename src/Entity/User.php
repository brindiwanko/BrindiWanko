<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`car_accounts`')]
#[ORM\Index(name: 'idx_car_accounts_pseudo', columns: ['pseudo'])]
#[ORM\Index(name: 'idx_car_accounts_pseudo', columns: ['email'])]
#[UniqueEntity(fields: 'pseudo', errorPath: 'pseudo')]
#[UniqueEntity(fields: 'email', errorPath: 'email')]
#[ORM\HasLifecycleCallbacks]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $pseudo = null;

    #[ORM\Column(length: 255)]
    private ?string $password = null;

    #[ORM\Column(length: 50)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $secret_question = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $secret_answer = null;

    #[ORM\Column(nullable: true)]
    private ?int $account_access = null;

    #[ORM\Column(nullable: true)]
    private ?int $account_status = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $account_reason = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $account_last_action = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $account_last_connection = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $account_last_ip = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): static
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): static
    {
        $this->password = $password;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getSecretQuestion(): ?string
    {
        return $this->secret_question;
    }

    public function setSecretQuestion(?string $secret_question): static
    {
        $this->secret_question = $secret_question;

        return $this;
    }

    public function getRoles(): array
    {
        if(empty($this->roles)) {
            $this->roles = ['ROLE_USER'];
        }

        return $this->roles;
    }

    public function setRoles(?array $roles): static
    {
        if(empty($roles)) {
            $roles = ['ROLE_USER'];
        }
        $this->roles = $roles;

        return $this;
    }

    public function eraseCredentials(): void
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function getUserIdentifier(): string
    {
        return $this->getPseudo();
    }

    public function getSecretAnswer(): ?string
    {
        return $this->secret_answer;
    }

    public function setSecretAnswer(?string $secret_answer): static
    {
        $this->secret_answer = $secret_answer;

        return $this;
    }

    public function getAccountAccess(): ?int
    {
        return $this->account_access;
    }

    public function setAccountAccess(?int $account_access): static
    {
        $this->account_access = $account_access;

        return $this;
    }

    public function getAccountStatus(): ?int
    {
        return $this->account_status;
    }

    public function setAccountStatus(?int $account_status): static
    {
        $this->account_status = $account_status;

        return $this;
    }

    public function getAccountReason(): ?string
    {
        return $this->account_reason;
    }

    public function setAccountReason(?string $account_reason): static
    {
        $this->account_reason = $account_reason;

        return $this;
    }

    public function getAccountLastAction(): ?\DateTimeInterface
    {
        return $this->account_last_action;
    }

    public function setAccountLastAction(?\DateTimeInterface $account_last_action): static
    {
        $this->account_last_action = $account_last_action;

        return $this;
    }

    public function getAccountLastConnection(): ?\DateTimeInterface
    {
        return $this->account_last_connection;
    }

    public function setAccountLastConnection(?\DateTimeInterface $account_last_connection): static
    {
        $this->account_last_connection = $account_last_connection;

        return $this;
    }

    public function getAccountLastIp(): ?string
    {
        return $this->account_last_ip;
    }

    public function setAccountLastIp(?string $account_last_ip): static
    {
        $this->account_last_ip = $account_last_ip;

        return $this;
    }
}
