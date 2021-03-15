<?php

namespace App\Entity;

use App\Repository\PalestranteRepository;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=PalestranteRepository::class)
 */
class Palestrante
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank(message="Informe o nome do palestrante")
     */
    private $nome;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank(message="Informe a especialidade do palestrante")
     */
    private $especialidade;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descricao;

    /**
     * @ORM\OneToMany(targetEntity=Palestra::class, mappedBy="palestrante", orphanRemoval=false)
     */
    private $palestras;

    public function __construct()
    {
        $this->palestras = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getEspecialidade(): ?string
    {
        return $this->especialidade;
    }

    public function setEspecialidade(string $especialidade): self
    {
        $this->especialidade = $especialidade;

        return $this;
    }

    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): self
    {
        $this->descricao = $descricao;

        return $this;
    }


    /**
     * @return Collection|Palestra[]
     */
    public function getPalestras(): Collection
    {
        return $this->palestras;
    }

    public function addPalestra(Palestra $palestra): self
    {
        if (!$this->palestras->contains($palestra)) {
            $this->palestras[] = $palestra;
            $palestra->setPalestrante($this);
        }

        return $this;
    }

    public function removePalestra(Palestra $palestra): self
    {
        if ($this->palestras->removeElement($palestra)) {
            // set the owning side to null (unless already changed)
            if ($palestra->getPalestrante() === $this) {
                $palestra->setPalestrante(null);
            }
        }

        return $this;
    }
}
