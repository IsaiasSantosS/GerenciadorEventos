<?php

namespace App\Entity;

use App\Repository\EventosRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=EventosRepository::class)
 */
class Eventos
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $titulo;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dt_inicio;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dt_fim;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descricao;

    /**
     * @ORM\OneToMany(targetEntity=Palestra::class, mappedBy="eventos", orphanRemoval=false)
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

    public function getTitulo(): ?string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    public function getDtInicio(): ?\DateTimeInterface
    {
        return $this->dt_inicio;
    }

    public function setDtInicio(\DateTimeInterface $dt_inicio): self
    {
        $this->dt_inicio = $dt_inicio;

        return $this;
    }

    public function getDtFim(): ?\DateTimeInterface
    {
        return $this->dt_fim;
    }

    public function setDtFim(\DateTimeInterface $dt_fim): self
    {
        $this->dt_fim = $dt_fim;

        return $this;
    }

    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    public function setDescricao(?string $descricao): self
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
            $palestra->setEventos($this);
        }

        return $this;
    }

    public function removePalestra(Palestra $palestra): self
    {
        if ($this->palestras->removeElement($palestra)) {
            // set the owning side to null (unless already changed)
            if ($palestra->getEventos() === $this) {
                $palestra->setEventos(null);
            }
        }

        return $this;
    }
}
