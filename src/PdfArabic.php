<?php

namespace Mfnannah\PdfArabic;

use Arphp\Glyphs;
use Closure;
use Dompdf\Dompdf;
use Filament\Actions\Concerns\CanCustomizeProcess;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class PdfArabic extends Action
{
    use CanCustomizeProcess;

    protected ?Closure $mutateRecordDataUsing = null;

    public static function getDefaultName(): ?string
    {
        return 'arabicPdf';
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->label('PDF');

        $this->modalHeading(fn (): string => 'PDF');

        $this->successNotificationTitle(__('filament-actions::edit.single.notifications.saved.title'));

        $this->icon('heroicon-o-arrow-down');

        $this->action(function (): void {
            $this->process(function (array $data, Model $record, Table $table) {
                $arabic = new Glyphs;
                $data = [
                    'record' => $record,
                    'arabic' => $arabic,
                ];
                $html = view('templates.pdf', $data)->render();
                $dompdf = new Dompdf;
                $dompdf->loadHtml($html);
                $dompdf->setPaper('A4', 'portrait');
                $dompdf->render();
                $dompdf->stream('document.pdf');
            });

            $this->success();
        });
    }
}
