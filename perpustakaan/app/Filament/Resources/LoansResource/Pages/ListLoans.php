<?php

namespace App\Filament\Resources\LoansResource\Pages;

use App\Filament\Resources\LoansResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Barryvdh\DomPDF\Facade\PDF;
use App\Models\anggota;
use App\Models\loans;

class ListLoans extends ListRecords
{
    protected static string $resource = LoansResource::class;

    protected $startDate = '2024-01-01'; 
    protected $endDate = '2024-10-31';   

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('cetak_laporan')
                ->label('Cetak Laporan')
                ->icon('heroicon-o-printer')
                ->action(fn() => $this->cetakLaporan())
                ->requiresConfirmation()
                ->modalHeading('Cetak Laporan Anggota')
                ->modalSubheading('Apakah Anda yakin ingin mencetak laporan?'),
        ];
    }

    public function cetakLaporan()
    {
        $startDate = $this->startDate;  
        $endDate = $this->endDate;    

        $anggotaAktif = loans::select(
                'anggotas.name as nama', 
                'anggotas.email', 
                'anggotas.phone', 
                \DB::raw('GROUP_CONCAT(loans.borrow_date ORDER BY loans.borrow_date SEPARATOR ", ") as borrow_dates'),
                \DB::raw('GROUP_CONCAT(loans.return_date ORDER BY loans.return_date SEPARATOR ", ") as return_dates'),
                \DB::raw('COUNT(loans.id) as total_pinjaman')
            )
            ->join('anggotas', 'loans.member_id', '=', 'anggotas.id')
            ->where('loans.dipinjam', 'dipinjam')
            ->whereBetween('loans.borrow_date', [$startDate, $endDate])
            ->groupBy('anggotas.id')
            ->orderByDesc('total_pinjaman')
            ->get();


        $pdf = PDF::loadView('cetak', ['anggotaAktif' => $anggotaAktif, 'startDate' => $startDate, 'endDate' => $endDate]);

        return $pdf->download('laporan_anggota_aktif.pdf');
    }

}
