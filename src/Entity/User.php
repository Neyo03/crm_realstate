<?php

namespace App\Entity;

use App\Enum\UserPermissionEnum;
use App\Enum\UserRoleEnum;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
class User
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 18)]
    private ?string $password = null;

    /**
     * @var Collection<int, Files>
     */
    #[ORM\OneToMany(targetEntity: Files::class, mappedBy: 'addedBy')]
    private Collection $files;

    /**
     * @var Collection<int, Realstate>
     */
    #[ORM\OneToMany(targetEntity: Realstate::class, mappedBy: 'agent')]
    private Collection $realstates;

    /**
     * @var Collection<int, UserRoleEnum>
     */
    #[ORM\Column(type: 'simple_array')]
    private array $roles = [];

    /**
     * @var Collection<int, UserPermissionEnum>
     */
    #[ORM\Column(type: 'simple_array')]
    private array $permissions = [];

    public function __construct()
    {
        $this->files = new ArrayCollection();
        $this->realstates = new ArrayCollection();
        $this->roles = [];
        $this->permissions = [];
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): static
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @return Collection<int, Files>
     */
    public function getFiles(): Collection
    {
        return $this->files;
    }

    public function addFile(Files $file): static
    {
        if (!$this->files->contains($file)) {
            $this->files->add($file);
            $file->setAddedBy($this);
        }

        return $this;
    }

    public function removeFile(Files $file): static
    {
        if ($this->files->removeElement($file)) {
            // set the owning side to null (unless already changed)
            if ($file->getAddedBy() === $this) {
                $file->setAddedBy(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Realstate>
     */
    public function getRealstates(): Collection
    {
        return $this->realstates;
    }

    public function addRealstate(Realstate $realstate): static
    {
        if (!$this->realstates->contains($realstate)) {
            $this->realstates->add($realstate);
            $realstate->setAgent($this);
        }

        return $this;
    }

    public function removeRealstate(Realstate $realstate): static
    {
        if ($this->realstates->removeElement($realstate)) {
            // set the owning side to null (unless already changed)
            if ($realstate->getAgent() === $this) {
                $realstate->setAgent(null);
            }
        }

        return $this;
    }


    /**
     * Get the roles assigned to the user.
     *
     * @return array
     */
    public function getRoles(): array
    {
        return $this->roles;
    }

    /**
     * Set the roles for the user.
     *
     * @param array $roles
     * @return static
     */
    public function setRoles(array $roles): static
    {
        $this->roles = $roles;
        return $this;
    }

    /**
     * Add a role to the user.
     *
     * @param UserRoleEnum $role
     * @return static
     */
    public function addRole(UserRoleEnum $role): static
    {
        if (!in_array($role->value, $this->roles, true)) {
            $this->roles[] = $role->value;
        }

        return $this;
    }

    /**
     * Remove a role from the user.
     *
     * @param UserRoleEnum $role
     * @return static
     */
    public function removeRole(UserRoleEnum $role): static
    {
        if (($key = array_search($role->value, $this->roles, true)) !== false) {
            unset($this->roles[$key]);
        }

        return $this;
    }

    /**
     * Get the permissions assigned to the user.
     *
     * @return array
     */
    public function getPermissions(): array
    {
        return $this->permissions;
    }

    /**
     * Set the permissions for the user.
     *
     * @param array $permissions
     * @return static
     */
    public function setPermissions(array $permissions): static
    {
        $this->permissions = $permissions;
        return $this;
    }

    /**
     * Add a permission to the user.
     *
     * @param UserPermissionEnum $permission
     * @return static
     */
    public function addPermission(UserPermissionEnum $permission): static
    {
        if (!in_array($permission->value, $this->permissions, true)) {
            $this->permissions[] = $permission->value;
        }

        return $this;
    }

    /**
     * Remove a permission from the user.
     *
     * @param UserPermissionEnum $permission
     * @return static
     */
    public function removePermission(UserPermissionEnum $permission): static
    {
        if (($key = array_search($permission->value, $this->permissions, true)) !== false) {
            unset($this->permissions[$key]);
        }

        return $this;
    }
}
