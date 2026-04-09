<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Vhl;
use App\Models\User;
use App\Models\DailyCheck;
use App\Models\Kilometrage;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Http\Response;



use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use Illuminate\Support\Facades\Validator;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;


class DailyCheckController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/dailychecks",
     *     tags={"DailyChecks"},
     *     summary="Get list of daily checks",
     *     @OA\Response(
     *         response=200,
     *         description="List of daily checks",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/DailyCheck")
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="page",
     *         in="query",
     *         description="Page number",
     *         required=false,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Parameter(
     *         name="per_page",
     *         in="query",
     *         description="Items per page",
     *         required=false,
     *         @OA\Schema(type="integer")
     *     )
     * )
     */
    public function index(Request $request)
    {
        //$perPage = $request->get('per_page', 10);
        $dailyChecks = DailyCheck::with(['vhl', 'user', 'utilisateur'])
            ->orderBy('dateControle', 'desc')
            ->get();

        return response()->json($dailyChecks, Response::HTTP_OK);
    }

    /**
     * @OA\Post(
     *     path="/api/dailychecks",
     *     tags={"DailyChecks"},
     *     summary="Create a new daily check",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/DailyCheckRequest")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Daily check created successfully",
     *         @OA\JsonContent(ref="#/components/schemas/DailyCheck")
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error"
     *     )
     * )
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'dateControle' => 'required|date',
            'frein' => 'boolean',
            'pneus' => 'boolean',
            'eclairage' => 'boolean',
            'extincteur' => 'boolean',
            'batterie' => 'boolean',
            'fuite' => 'boolean',
            'avertisseur' => 'boolean',
            'ceinture' => 'boolean',
            'retroviseur' => 'boolean',
            'observation' => 'nullable|string|max:500',
            'vhl_id' => 'required|nullable|exists:vhls,id',
            'user_id' => 'nullable|exists:users,id',
            'utilisateur_id' => 'nullable|exists:utilisateurs,id',
            'kilometrage' => 'nullable',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $dailyCheck = DailyCheck::create($request->all());

        return response()->json([
            'message' => 'Daily check created successfully',
            'data' => $dailyCheck->load(['vhl', 'user', 'utilisateur'])
        ], Response::HTTP_CREATED);
    }

    /**
     * @OA\Get(
     *     path="/api/dailychecks/{id}",
     *     tags={"DailyChecks"},
     *     summary="Get specific daily check",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of daily check",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Daily check details",
     *         @OA\JsonContent(ref="#/components/schemas/DailyCheck")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Daily check not found"
     *     )
     * )
     */
    public function show($id)
    {
        $dailyCheck = DailyCheck::with(['vhl', 'user', 'utilisateur'])->find($id);

        if (!$dailyCheck) {
            return response()->json([
                'message' => 'Daily check not found'
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json($dailyCheck, Response::HTTP_OK);
    }

    /**
     * @OA\Put(
     *     path="/api/dailychecks/{id}",
     *     tags={"DailyChecks"},
     *     summary="Update daily check",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         description="ID of daily check",
     *         required=true,
     *         @OA\Schema(type="integer")
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/DailyCheckRequest")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Daily check updated successfully",
     *         @OA\JsonContent(ref="#/components/schemas/DailyCheck")
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="Daily check not found"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Validation error"
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        $dailyCheck = DailyCheck::find($id);

        if (!$dailyCheck) {
            return response()->json([
                'message' => 'Daily check not found'
            ], Response::HTTP_NOT_FOUND);
        }

        $validator = Validator::make($request->all(), [
            'dateControle' => 'sometimes|required|date',
            'frein' => 'sometimes|boolean',
            'pneus' => 'sometimes|boolean',
            'eclairage' => 'sometimes|boolean',
            'extincteur' => 'sometimes|boolean',
            'batterie' => 'sometimes|boolean',
            'fuite' => 'sometimes|boolean',
            'avertisseur' => 'sometimes|boolean',
            'ceinture' => 'sometimes|boolean',
            'retroviseur' => 'sometimes|boolean',
            'observation' => 'nullable|string|max:500',
            'vhl_id' => 'nullable|exists:vhls,id',
            'user_id' => 'nullable|exists:users,id',
            'utilisateur_id' => 'nullable|exists:utilisateurs,id',
            'kilometrage' => 'nullable',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $validator->errors()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $dailyCheck->update($request->all());

        return response()->json([
            'message' => 'Daily check updated successfully',
            'data' => $dailyCheck->load(['vhl', 'user', 'utilisateur'])
        ], Response::HTTP_OK);
    }


    public function destroy($id)
    {
        $dailyCheck = DailyCheck::find($id);

        if (!$dailyCheck) {
            return response()->json([
                'message' => 'Daily check not found'
            ], Response::HTTP_NOT_FOUND);
        }

        $dailyCheck->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }


    public function getByVhl($vhlId)
    {
        $dailyChecks = DailyCheck::with(['vhl', 'user', 'utilisateur'])
            ->where('vhl_id', $vhlId)
            ->orderBy('dateControle', 'desc')
            ->get();

        return response()->json($dailyChecks, Response::HTTP_OK);
    }


    public function filter(Request $request)
    {
        $query = DailyCheck::with(['vhl', 'user', 'utilisateur']);

        // Filtre par date
        if ($request->has('start_date')) {
            $query->where('dateControle', '>=', $request->start_date);
        }

        if ($request->has('end_date')) {
            $query->where('dateControle', '<=', $request->end_date);
        }

        // Filtre par utilisateur
        if ($request->has('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        if ($request->has('utilisateur_id')) {
            $query->where('utilisateur_id', $request->utilisateur_id);
        }

        // Filtre par véhicule
        if ($request->has('vhl_id')) {
            $query->where('vhl_id', $request->vhl_id);
        }

        $dailyChecks = $query->orderBy('dateControle', 'desc')->paginate($request->per_page ?? 10);

        return response()->json($dailyChecks, Response::HTTP_OK);
    }



    public function monthlyStats(Request $request)
    {
        $year = $request->get('year', date('Y'));

        $stats = DailyCheck::selectRaw('
                MONTH(dateControle) as month,
                COUNT(*) as count,
                AVG(CASE WHEN frein = 1 AND pneus = 1 AND eclairage = 1 AND extincteur = 1
                        AND batterie = 1 AND fuite = 0 AND avertisseur = 1
                         AND ceinture = 1 AND retroviseur = 1 THEN 1 ELSE 0 END) * 100 as percentage_ok
            ')
            ->whereYear('dateControle', $year)
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->map(function ($item) {
                return [
                    'month' => Carbon::create()->month($item->month)->format('F'),
                    'count' => $item->count,
                    'percentage_ok' => round($item->percentage_ok, 2)
                ];
            });

        return response()->json(['data' => $stats], Response::HTTP_OK);
    }




    public function exportExcel(Request $request)
    {
        $startDate = $request->get('start_date');
        $endDate = $request->get('end_date');

        // return Excel::download(new DailyChecksExport($startDate, $endDate), 'daily-checks-'.now()->format('Y-m-d').'.xlsx');
    }


    public function exportPdf(Request $request)
    {
        $query = DailyCheck::with(['vhl', 'user', 'utilisateur']);

        if ($request->has('start_date')) {
            $query->where('dateControle', '>=', $request->start_date);
        }

        if ($request->has('end_date')) {
            $query->where('dateControle', '<=', $request->end_date);
        }

        $dailyChecks = $query->orderBy('dateControle', 'desc')->get();

        $pdf = Pdf::loadView('exports.dailychecks', [
            'dailyChecks' => $dailyChecks,
            'startDate' => $request->start_date,
            'endDate' => $request->end_date
        ]);

        return $pdf->download('daily-checks-' . now()->format('Y-m-d') . '.pdf');
    }







    public function generatePDF()
    {
        $data = DailyCheck::all()->toArray();

        $pdf = Pdf::loadView('monPdf', $data)->setPaper('A4', 'landscape')->setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
            'dpi' => 300
        ]);
        $pdf->save(public_path('./document.pdf'));
        return $pdf->stream('document.pdf');
    }

    // public function generateInvoice($orderId)
    // {
    //     $order = Order::findOrFail($orderId);
    //     $pdf = PDF::loadView('invoices.show', compact('order'));
    //     return $pdf->download('facture-'.$order->id.'.pdf');
    // }

    // public function exportReport(Request $request)
    // {
    //     $data = Report::generateData($request->all());
    //     $pdf = PDF::loadView('reports.export', $data)
    //               ->setPaper('A4', 'portrait');
    //     return $pdf->stream('rapport-'.now()->format('Y-m-d').'.pdf');
    // }




    public function exportSimple()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'Hello World !');
        $sheet->setCellValue('A2', 'Second ligne');

        $writer = new Xlsx($spreadsheet);

        $filename = 'export_simple.xlsx';
        $writer->save($filename);

        return response()->download($filename)->deleteFileAfterSend(true);
    }




    public function exportUsers()
    {
        $users = User::all();
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // En-têtes
        $sheet->setCellValue('A1', 'ID');
        $sheet->setCellValue('B1', 'Nom');
        $sheet->setCellValue('C1', 'Email');

        // Centrer le texte
        $sheet->getStyle('A1:C1')->getAlignment()
            ->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // Bordures
        $sheet->getStyle('A1:C40')->getBorders()
            ->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

        // Couleur de fond
        $sheet->getStyle('A1:C1')->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->getStartColor()->setARGB('FFD9D9D9');

        // Données
        $row = 2;
        foreach ($users as $user) {
            $sheet->setCellValue('A' . $row, $user->id);
            $sheet->setCellValue('B' . $row, $user->name);
            $sheet->setCellValue('C' . $row, $user->email);
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $filename = 'users_export.xlsx';
        $writer->save($filename);

        return response()->download($filename)->deleteFileAfterSend(true);
    }



    public function importUsers(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ]);

        $file = $request->file('file');
        $spreadsheet = IOFactory::load($file->getRealPath());
        $sheet = $spreadsheet->getActiveSheet();

        $rows = $sheet->toArray();
        array_shift($rows); // Supprimer les en-têtes

        foreach ($rows as $row) {
            User::create([
                'name' => $row[1],
                'email' => $row[2],
                'password' => bcrypt('password')
            ]);
        }

        return back()->with('success', 'Utilisateurs importés avec succès!');
    }


    public function ExportBlade()
    {
        // Récupération des données (à adapter selon votre modèle)
        $data = DailyCheck::paginate()->get(); // Vos données de contrôle technique (probablement depuis une base de données)

        // Calcul des statistiques
        $stats = [
            'conformes' => 0,
            'reserves' => 0,
            'non_conformes' => 0
        ];

        foreach ($data as $control) {
            $points = $control['frein'] + $control['pneus'] + $control['eclairage'] +
                $control['extincteur'] + $control['batterie'] + $control['fuite'] +
                $control['avertisseur'] + $control['ceinture'] + $control['retroviseur'];

            if ($points >= 8) {
                $stats['conformes']++;
            } elseif ($points >= 5) {
                $stats['reserves']++;
            } else {
                $stats['non_conformes']++;
            }
        }

        // Récupération de la liste des véhicules (à adapter)
        $vehicles = Vhl::paginate()->get(); // Votre liste de véhicules

        return view('main', [
            'data' => $data,
            'stats' => $stats,
            'vehicles' => $vehicles
        ]);
    }


}
