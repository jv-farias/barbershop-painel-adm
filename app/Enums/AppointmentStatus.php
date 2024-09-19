<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum AppointmentStatus: string implements HasColor, HasIcon, HasLabel
{
    case Pending = 'pending';

    case Completed = 'completed';

    case Canceled = 'canceled';

    public function getLabel(): string
    {
        return match ($this) {
            self::Pending => 'Pendente',
            self::Completed => 'Completado',
            self::Canceled => 'Cancelado',
        };
    }

    public function getColor(): string | array | null
    {
        return match ($this) {
            self::Pending => 'info',
            self::Completed => 'success',
            self::Canceled => 'danger',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::Pending => 'heroicon-m-sparkles',
            self::Completed => 'heroicon-m-check-badge',
            self::Canceled => 'heroicon-m-x-circle',
        };
    }
}
