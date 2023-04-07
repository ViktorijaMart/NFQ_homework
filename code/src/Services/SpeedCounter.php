<?php
declare(strict_types=1);

namespace App\Services;

class SpeedCounter {

    private const READING_SPEED = 200;
    private const LONG_WORD_LENGTH = 3;

    public function getReadingTimeData(array $articles): array
    {
        $readingTimeData = [];

        foreach ($articles as $article) {
            $articleReadingData = [];
            $articleReadingData['article_id'] = $article->getId();
            $articleReadingData['reading_time'] = $this->countReadingTime($article->getText());

            $readingTimeData[] = $articleReadingData;
        }

        return $readingTimeData;
    }

    private function countReadingTime(string $text): int
    {
        $longWordCount = 0;
        $wordArray = explode(' ', $text);

        foreach ($wordArray as $word) {
            if(strlen($word) > self::LONG_WORD_LENGTH) {
                $longWordCount++;
            }
        }

        $readingTime = ceil($longWordCount / self::READING_SPEED);

        return (int) $readingTime;
    }
}