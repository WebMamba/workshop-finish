<?php

namespace App\DataFixtures;

use App\Entity\Radio;
use App\Entity\Song;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class RadioFixture extends Fixture
{
    public function __construct(
        private readonly HttpClientInterface $httpClient
    ) {}

    public function load(ObjectManager $manager): void
    {
        $response = $this->httpClient->request('GET', 'https://www.nostalgie.fr/onair.json');
        $data = $response->toArray();

        foreach ($data as $radioData) {
            $radio = new Radio();

            $types = [];
            foreach ($radioData['genres'] as $type) {
                $types[] = $type['slug'];
            }

            $radio
                ->setName($radioData['name'])
                ->setColor($radioData['color'])
                ->setLogo($radioData['logo'])
                ->setUrl($radioData['url_128k_mp3'])
                ->setTypes($types)
            ;

            $playlist = $radioData['playlist'];
            foreach ($playlist as $song) {
                if (isset($song['song'])) {
                    $songData = $song['song'];
                    $song = new Song();

                    $song->setRadio($radio);
                    $song->setTitle($songData['title']);
                    $song->setArtist($songData['artist']);
                    $song->setImage($songData['img_url']);

                    $manager->persist($song);
                    $radio->addSong($song);
                }
            }

            $manager->persist($radio);
        }

        $manager->flush();
    }
}
