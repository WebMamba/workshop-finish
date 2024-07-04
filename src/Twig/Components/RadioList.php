<?php

namespace App\Twig\Components;

use App\Repository\RadioRepository;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\Attribute\LiveProp;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent]
final class RadioList
{
    use DefaultActionTrait;

    #[LiveProp(writable: true)]
    public ?string $search = null;

    public function __construct(
        private readonly RadioRepository $radioRepository
    ) {}

    public function getRadios(): array
    {
       if ($this->search === null) {
            return $this->radioRepository->findAll();
        }

        return $this->radioRepository->search($this->search);
    }
}
