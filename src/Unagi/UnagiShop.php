<?php

declare(strict_types=1);

namespace LearnModernPhp\Unagi;

final class UnagiShop
{
    /**
     * @param int $numberOfSeat
     * @param array<array<int>> $groupList
     * @param array<bool> $seats
     */
    public function __construct(
        private readonly int $numberOfSeat,
        private readonly array $groupList,
        private array $seats = [],
    ) {
        // 席の初期化
        $this->seats = $this->init($this->numberOfSeat);

        // グループごとに人を配置する
        foreach ($this->groupList as $group) {
            $this->seats = $this->place($group[0], $group[1], $this->numberOfSeat, $this->seats);
        }
    }

    /**
     * @param int $numberOfSeat
     * @return array<bool>
     */
    private function init(int $numberOfSeat): array
    {
        return array_fill(0, $numberOfSeat, false);
    }

    /**
     * @param int $numberOfGroupMember
     * @param int $startPosition
     * @param int $numberOfSeat
     * @param array<bool> $seats
     * @return array<bool>
     */
    private function place(int $numberOfGroupMember, int $startPosition, int $numberOfSeat, array $seats): array
    {
        $endPosition = $startPosition + $numberOfGroupMember - 1;
        if ($this->angry($startPosition, $endPosition, $numberOfSeat, $seats)) {
            return $seats;
        }
        return $this->seated($startPosition, $endPosition, $numberOfSeat, $seats);
    }

    /**
     * @param int $startPosition
     * @param int $endPosition
     * @param int $numberOfSeat
     * @param array<bool> $seats
     * @return bool
     */
    private function angry(int $startPosition, int $endPosition, int $numberOfSeat, array $seats): bool
    {
        $angry = false;
        for ($i = $startPosition; $i <= $endPosition; $i++) {
            $cur = $this->currentIndex($i, $numberOfSeat);
            if ($seats[$cur - 1]) {
                $angry = true;
                break;
            }
        }
        return $angry;
    }

    private function currentIndex(int $currentPoint, int $numberOfSeat): int
    {
        return $currentPoint > $numberOfSeat ? $currentPoint - $numberOfSeat : $currentPoint;
    }

    /**
     * @param int $startPosition
     * @param int $endPosition
     * @param int $numberOfSeat
     * @param array<bool> $seats
     * @return array<bool>
     */
    private function seated(int $startPosition, int $endPosition, int $numberOfSeat, array $seats): array
    {
        $result = $seats;
        for ($i = $startPosition; $i <= $endPosition; $i++) {
            $cur = $this->currentIndex($i, $numberOfSeat);
            $result[$cur - 1] = true;
        }
        return $result;
    }

    /**
     * 席についている人の人数を返す
     * @return int
     */
    public function get(): int
    {
        return array_reduce($this->seats, function ($carry, $seat) {
            return $seat ? $carry + 1 : $carry;
        }, 0);
    }
}
