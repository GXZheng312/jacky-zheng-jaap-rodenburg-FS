<?php

namespace App\Console\Commands;

use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Console\Command;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class DailyExcel extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'sales:daily';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Make a sales excel file each day';

  /**
   * Create a new command instance.
   *
   * @return void
   */
  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Execute the console command.
   *
   * @return void
   */
  public function handle()
  {
    $this->createExcel();
    return $this->info('Created the Excel File');
  }

  private function createExcel()
  {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $restaurantOrders = Order::where('afhaaltijdstip', '=', null)
      ->with('orders')
      ->with('orders.gerecht')
      ->with('orders.aanbieding')
      ->get();

    $takeAwayOrders = Order::where('afhaaltijdstip', '!=', null)
      ->with('orders')
      ->with('orders.gerecht')
      ->with('orders.aanbieding')
      ->get();

    $this->addOrdersToSheet($sheet, $restaurantOrders);
    $sheet = $spreadsheet->createSheet(1);
    $this->addOrdersToSheet($sheet, $takeAwayOrders);

    $writer = new Xlsx($spreadsheet);
    $writer->save('public/sales/sales-' . Carbon::now()->format('Y-m-d') . '.xlsx');
  }

  private function addOrdersToSheet($sheet, $orders)
  {
    $highestCellIndex = 0;
    $sheet->setCellValue('A1', 'orderID');
    $sheet->setCellValue('B1', 'AfhaalTijd');
    $sheet->setCellValue('C1', 'naam');
    foreach ($orders as $index => $order) {
      $index = $index + 2;
      $cellIndex = 0;
      $sheet->setCellValue($this->num2alpha($cellIndex++) . $index, $order->id);
      $sheet->setCellValue($this->num2alpha($cellIndex++) . $index, $order->afhaaltijdstip);
      $sheet->setCellValue($this->num2alpha($cellIndex++) . $index, $order->naam);
      foreach ($order->orders as $sub_order) {
        $sheet->setCellValue($this->num2alpha($cellIndex++) . $index, $sub_order->gerecht->naam);
        $sheet->setCellValue($this->num2alpha($cellIndex++) . $index, $sub_order->opmerking);
        $sheet->setCellValue($this->num2alpha($cellIndex++) . $index, $sub_order->aanbieding_id);
        $sheet->setCellValue($this->num2alpha($cellIndex++) . $index, $sub_order->aantal);
      }
      if ($cellIndex - 3 > $highestCellIndex) {
        $highestCellIndex = $cellIndex - 3;
      }
    }
    for ($i = 0; $i < $highestCellIndex / 4; $i++) {
      $localindex = 3;
      $cellIndex = $i * 4;
      $sheet->setCellValue($this->num2alpha($cellIndex + $localindex++) . '1', 'gerecht_' . $i);
      $sheet->setCellValue($this->num2alpha($cellIndex + $localindex++) . '1', 'opmerking_' . $i);
      $sheet->setCellValue($this->num2alpha($cellIndex + $localindex++) . '1', 'aanbieding_id_' . $i);
      $sheet->setCellValue($this->num2alpha($cellIndex + $localindex++) . '1', 'aantal_' . $i);
    }
  }

  private function num2alpha($n)
  {
    $r = '';
    for ($i = 1; $n >= 0 && $i < 10; $i++) {
      $r = chr(0x41 + ($n % pow(26, $i)) / pow(26, $i - 1)) . $r;
      $n -= pow(26, $i);
    }
    return $r;
  }
}
