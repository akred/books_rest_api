<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\BookRepository;
use App\Entity\Library;
use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiProperty;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ApiResource(
 *     collectionOperations={"get", "post"},
 *     itemOperations={"get", "put", "delete"},
 *     normalizationContext={"groups"={"book:read"}},
 *     denormalizationContext={"groups"={"book:write"}}
 * )
 * @ORM\Entity(repositoryClass=BookRepository::class)
 * @ORM\Table(name="`book`")
 */
class Book
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"book:read", "book:write", "library:read"})
     * @Assert\NotBlank()
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"book:read", "book:write", "library:read"})
     * @Assert\NotBlank()
     */
    private $author;

    /**
     * @ORM\Column(type="text")
     * @Groups({"book:read", "book:write", "library:read"})
     * @Assert\NotBlank()
     */
    private $summary;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"book:read", "book:write", "library:read"})
     * @Assert\Isbn()
     * @ApiProperty(
     *  attributes={
     *      "openapi_context"={
     *          "type"="string",
     *          "example"="978-1-56619-909-4"
     *      }
     *  }
     * )
     */
    private $isbn;

    /**
     * @ORM\ManyToOne(targetEntity="Library", inversedBy="books")
     * @ORM\JoinColumn(nullable=false))
     * @Groups({"book:read", "book:write"})
     * @ApiProperty(
     *  attributes={
     *      "openapi_context"={
     *          "type"="Library",
     *          "example"="api/libraries/1"
     *      }
     *  }
     * )
     */
    private $library;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"book:read", "library:read"})
     */
    private $createdAt;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"book:read", "library:read"})
     */
    private $updatedAt;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): self
    {
        $this->author = $author;

        return $this;
    }

    public function setSummary(string $summary): self
    {
        $this->summary = $summary;

        return $this;
    }

    public function getSummary(): ?string
    {
        return $this->summary;
    }

    public function getIsbn(): ?string
    {
        return $this->isbn;
    }

    public function setIsbn(string $isbn): self
    {
        $this->isbn = $isbn;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getLibrary(): Library
    {
        return $this->library;
    }

    public function addLibrary(Library $library): self
    {
        if (!$this->library->getCategory() === $library->getCategory()) {
            $this->library = $library;
        }

        return $this;
    }

    public function removeLibrary(Library $library): self
    {
        if (!$this->library->getCategory() === $library->getCategory()) {
            $this->library = null;
        }

        return $this;
    }

    public function setLibrary(?Library $library): self
    {
        $this->library = $library;

        return $this;
    }

    public function __toString()
    {
        return $this->title;
    }
}
