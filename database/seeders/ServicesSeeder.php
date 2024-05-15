<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\SubService;
use App\Models\ApplicationFormFee;
use App\Models\DocumentUpload;
use App\Models\InspectionFee;
use App\Models\ProcessingFee;
use App\Models\ProcessingType;
use Illuminate\Support\Facades\DB;
use Modules\Shared\Models\Branch;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Disable foreign key checks during seeding
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Seed services
        $services = [
            "Dredging",
            "Reclamation",
            "Canalization/Dredging of Slots",
            "Diversion of Water/Blockage of Channel",
            "Sand Search",
            "Use of Right of Way",
            "Hydroelectric Power Dams and Power Generating Stations/Plants on Waterways and Its Right of Way",
            "Advertising Within Right of Way",
            "Pipelines Laying/Crossing",
            "Utility Lines",
            "Bridges",
            "Survey, Under Water Engineering Works and Removal of Wrecks",
            "Hydrological Information",
            "Charts and Maps",
            "Wharfage and Berthing",
            "Warehouse",
            "Examination Fees for Proficiency",
            "Registration of Crafts and Vessels and Survey Fees for River Crafts",
            "Vessels Re-Certification Fees",
            "Utility Rate Within Dockyard/River Ports",
            "River Guide/Pilotage",
            "Passage and Tolls",
            "Permit Fees for River Crafts Per Annum",
            "Slipway and Dockyard Services",
            "Ferry Service",
            "Ferry Vehicles",
            "Equipment and Property Leasing",
            "Landed Property",
        ];

        // Iterate through each branch id
        //Service::truncate();
        for ($i = 1; $i <= 24; $i++) {
            // Iterate through each service
            foreach ($services as $serviceName) {
                /* Service::create([
                    'name' => $serviceName,
                    'branch_id' => $i, // Assign the current branch id
                    'status' => 1,
                ]); */
            }
        }

        $servicesIds = [
            's_id' => [6, 34, 62, 90, 118, 146, 174, 202, 230, 258, 286, 314, 342, 370, 398, 426, 454, 482, 510, 538, 566, 594, 622, 650],
            'r_id' => [18, 46, 74, 102, 130, 158, 186, 214, 242, 270, 298, 326, 354, 382, 410, 438, 466, 494, 522, 550, 578, 606, 634, 662],
            'd_id' => [24, 52, 80, 108, 136, 164, 192, 220, 248, 276, 304, 332, 360, 388, 416, 444, 472, 500, 528, 556, 584, 612, 640, 668],
            'b_id' => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24],
        ];

        $subServices = [
            'serve1' => ["Pleasure(A)",
            "Domestic(B)",
            "Community(C)",
            "Commercial(D)"],
            "serve2" => ["Vessels less than 500T (Dredger/Houseboat/Tug boat)",
        "Vessels less than 500T (Barges and any other craft)",
        "Vessels more than 500T (Dredger/Houseboat/Tug boat)",
        "Vessels more than 500T (Barges and any other craft)"],
        "serve3" => ["SLIPWAY FACILITIES FLAT BOTTOM KEEL SHAPED CRAFT (Craft of 11 - 15m length - Slipping & launching charge)",
        "SLIPWAY FACILITIES FLAT BOTTOM KEEL SHAPED CRAFT (Craft of 11 - 15m length - Slipway/Cradle dues)",
        "SLIPWAY FACILITIES FLAT BOTTOM KEEL SHAPED CRAFT  (Craft of 16 - 20m length - Slipping & launching charge)",
        "SLIPWAY FACILITIES FLAT BOTTOM KEEL SHAPED CRAFT  (Craft of 16 - 20m length - Slipway/Cradle dues)",
        "SLIPWAY FACILITIES FLAT BOTTOM KEEL SHAPED CRAFT  (Craft of 21 - 30m length - Slipping & launching charge)",
        "SLIPWAY FACILITIES FLAT BOTTOM KEEL SHAPED CRAFT  (Craft of 21 - 30m length - Slipway/Cradle dues)",
        "SLIPWAY FACILITIES FLAT BOTTOM KEEL SHAPED CRAFT  (Craft of 31 - 40m length - Slipping & launching charge)",
        "SLIPWAY FACILITIES FLAT BOTTOM KEEL SHAPED CRAFT  (Craft of 31 - 40m length - Slipway/Cradle dues)",
        "SLIPWAY FACILITIES FLAT BOTTOM KEEL SHAPED CRAFT  (Craft of 41m and above length - Slipping & launching charge)",
        "SLIPWAY FACILITIES FLAT BOTTOM KEEL SHAPED CRAFT  (Craft of 41m and above length - Slipway/Cradle dues)",
        "V-SHAPED KEEL BOTTOM CRAFT (Craft of 11 - 15m length - Slipping & launching charge)",
        "V-SHAPED KEEL BOTTOM CRAFT (Craft of 11 - 15m length - Slipway/Cradle dues)",
        "V-SHAPED KEEL BOTTOM CRAFT (Craft of 16 - 20m length - Slipping & launching charge)",
        "V-SHAPED KEEL BOTTOM CRAFT (Craft of 16 - 20m length - Slipway/Cradle dues)",
        "V-SHAPED KEEL BOTTOM CRAFT (Craft of 21 - 30m length - Slipping & launching charge)",
        "V-SHAPED KEEL BOTTOM CRAFT (Craft of 21 - 30m length - Slipway/Cradle dues)",
        "V-SHAPED KEEL BOTTOM CRAFT (Craft of 31 - 40m length - Slipping & launching charge)",
        "V-SHAPED KEEL BOTTOM CRAFT (Craft of 31 - 40m length - Slipway/Cradle dues)",
        "V-SHAPED KEEL BOTTOM CRAFT (Craft of 41 - 50m length - Slipping & launching charge)",
        "V-SHAPED KEEL BOTTOM CRAFT (Craft of 41 - 50m length - Slipway/Cradle dues)",
        "CRANE CHARGES FOR MOBILE & STATIONARY CRANE (80 - 100 Metric-Tons)",
        "CRANE CHARGES FOR MOBILE & STATIONARY CRANE (50 - 80 Metric-Tons)",
        "CRANE CHARGES FOR MOBILE & STATIONARY CRANE (30 - 50 Metric-Tons)",
        "CRANE CHARGES FOR MOBILE & STATIONARY CRANE (20 - 30 Metric-Tons)",
        "CRANE CHARGES FOR MOBILE & STATIONARY CRANE (15 - 20 Metric-Tons)",
        "CRANE CHARGES FOR MOBILE & STATIONARY CRANE (5 - 10 Metric-Tons)",
        "PLANTS AND MACHINERY CHARGES (Heavy duty machines in general - Example, Turning Lathe, Planting, Shaping, Swing machine and Wedding machine)",
        "PLANTS AND MACHINERY CHARGES (Light duty in general - Example, Pneumatic machine, Air compressors, Hand tools)",
        "LABOUR CHARGES",
        "MATERIAL CHARGE",
        "HIRE OF CRAFT (All motor passenger service - M/F Lokoja, M/F New Bussa, M/F Warri, M/F Onitsha and other sister craft)",
        "HIRE OF CRAFT (All motor vehicular ferries - M/F Yelwa, M/F Apapa, M/F Calabar, M/F Baro and other sister craft)",
        "HIRE OF CRAFT (All water buses - W/B Maroko, W/B Jamata, W/B Jebba and other sister craft)",
        "HIRE OF CRAFT (Tug Boats - MT Kainji Dam, Tiga Dam and other sister)",
        "HIRE OF CRAFT (Buoyage vessels - B/V Numan and other Buoyage vessels)",
        "HIRE OF CRAFT (Survey vessel - S/V Woodcock, S/V Woodpecker etc)",
        "HIRE OF CRAFT (Patrol/Survey/Harbour Launches)",
        "OUTBOARD ENGINES (25HP)",
        "OUTBOARD ENGINES (40HP)",
        "OUTBOARD ENGINES (55HP)",
        "OUTBOARD ENGINES (75HP)",
        "OUTBOARD ENGINES (85 - 100HP)",
        "OUTBOARD ENGINES (115 - 155HP)",
        "OUTBOARD ENGINES (Above 155HP)",
        "BOATS (Dinghies)",
        "BOATS (Self-propelled Barge)",
        "AUTHORITY'S FACILITIES (Hire of Jetty)"
    ],

        ];

        
        // Assuming SubService model is used
        //SubService::truncate();
foreach ($servicesIds['s_id'] as $key => $serviceId) {
    foreach ($subServices['serve1'] as $subServiceName) {
        $branchIndex = $key % count($servicesIds['b_id']); // Calculate branch index
        $branchId = $servicesIds['b_id'][$branchIndex]; // Get branch id based on index

        /* SubService::create([
            'name' => $subServiceName,
            'service_id' => $serviceId,
            'branch_id' => $branchId,
            'status' => 1,
        ]); */
    }
}
foreach ($servicesIds['r_id'] as $key => $serviceId) {
    foreach ($subServices['serve2'] as $subServiceName) {
        $branchIndex = $key % count($servicesIds['b_id']); // Calculate branch index
        $branchId = $servicesIds['b_id'][$branchIndex]; // Get branch id based on index

        /* SubService::create([
            'name' => $subServiceName,
            'service_id' => $serviceId,
            'branch_id' => $branchId,
            'status' => 1,
        ]); */
    }
}
foreach ($servicesIds['d_id'] as $key => $serviceId) {
    foreach ($subServices['serve3'] as $subServiceName) {
        $branchIndex = $key % count($servicesIds['b_id']); // Calculate branch index
        $branchId = $servicesIds['b_id'][$branchIndex]; // Get branch id based on index

        /* SubService::create([
            'name' => $subServiceName,
            'service_id' => $serviceId,
            'branch_id' => $branchId,
            'status' => 1,
        ]); */
    }
}

//application form fees
$all_services = Service::get();

$processingTypes = [
    "type1" => ["150000", "7500"],
    'type2' => ["10000", "30000", "20000", "150000"],
    "type5" => ["150000", "7500"],
    "type6" => ["150000", "7500"],
    "type7" => ["25000"],
    'b_id' => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24],
];

// Iterate over each branch ID
foreach ($processingTypes['b_id'] as $branch_id) {
    foreach ($all_services as $service) {
        // Assign branch ID to the service
        $service->branch_id = $branch_id;

        // Determine the processing type array based on service ID
        $service_id = $service->id;
        if (in_array($service_id, [1, 29, 57, 85, 113, 141, 169, 197, 225, 253, 281, 309, 337, 365, 393, 421, 449, 477, 505, 533, 561, 589, 617, 645])) {
            $processingTypeArray = $processingTypes['type1'];
        } elseif (in_array($service_id, [6, 34, 62, 90, 118, 146, 174, 202, 230, 258, 286, 314, 342, 370, 398, 426, 454, 482, 510, 538, 566, 594, 622, 650])) {
            $processingTypeArray = $processingTypes['type2'];
        } elseif (in_array($service_id, [18, 46, 74, 102, 130, 158, 186, 214, 242, 270, 298, 326, 354, 382, 410, 438, 466, 494, 522, 550, 578, 606, 634, 662])) {
            $processingTypeArray = $processingTypes['type5'];
        } elseif (in_array($service_id, [2, 30, 58, 86, 114, 142, 170, 198, 226, 254, 282, 310, 338, 366, 394, 422, 450, 478, 506, 534, 562, 590, 618, 646])) {
            $processingTypeArray = $processingTypes['type6'];
        } else {
            $processingTypeArray = $processingTypes['type7'];
        }

        // Fetch existing processing types associated with the service ID and branch ID
       
            /* foreach ($processingTypeArray as $processingType) {
                ApplicationFormFee::create([
                    'amount' => $processingType,
                    'service_id' => $service->id,
                    'branch_id' => $branch_id,
                ]);
            } */
       
    
        
    }
}

    // document upload
    $documentTypes = [
        "type1" => ["Application Form", "Title document", "Survey document", "Sand search report", "CAC certificate", "Pre & Post Dredge survey drawings", "E.I.A Report"],
        "type5" => ["Application Form", "Title document", "Survey document", "Sand search report", "CAC certificate", "Pre & Post Dredge survey drawings", "E.I.A Report"],
        "type6" => ["Application Form", "Title document", "Survey document", "Sand search report", "CAC certificate", "Pre & Post Dredge survey drawings", "E.I.A Report"],
        "type7" => ["Application Form", "Title document", "Survey document", "CAC certificate"],
        'b_id' => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24],
    ];

   
    // Add 'b_id' property to each service
    $b_ids_d = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24];

    $doc1 = [1, 29, 57, 85, 113, 141, 169, 197, 225, 253, 281, 309, 337, 365, 393, 421, 449, 477, 505, 533, 561, 589, 617, 645];
    $doc2 = [6, 34, 62, 90, 118, 146, 174, 202, 230, 258, 286, 314, 342, 370, 398, 426, 454, 482, 510, 538, 566, 594, 622, 650];
    $doc3 = [18, 46, 74, 102, 130, 158, 186, 214, 242, 270, 298, 326, 354, 382, 410, 438, 466, 494, 522, 550, 578, 606, 634, 662];
    $doc4 = [24, 52, 80, 108, 136, 164, 192, 220, 248, 276, 304, 332, 360, 388, 416, 444, 472, 500, 528, 556, 584, 612, 640, 668];
    $doc5 = [2, 30, 58, 86, 114, 142, 170, 198, 226, 254, 282, 310, 338, 366, 394, 422, 450, 478, 506, 534, 562, 590, 618, 646];
    $doc6 = [3, 31, 59, 87, 115, 143, 171, 199, 227, 255, 283, 311, 339, 367, 395, 423, 451, 479, 507, 535, 563, 591, 619, 647];
            
    
    // ProcessingType::truncate(); // Uncomment this line if you want to truncate the ProcessingType table before inserting new records
    
    foreach ($b_ids_d as $branch_id) {
        foreach ($all_services as $service) {
            // Assign branch ID to the service
            $service->branch_id = $branch_id;
    
            // Determine the Document Upload array based on service ID
        $service_id = $service->id;
        if (in_array($service_id, $doc1)) {
            $documentTypeArray = $documentTypes['type1'];
        } elseif (in_array($service_id, $doc5)) {
            $documentTypeArray = $documentTypes['type5'];
        } elseif (in_array($service_id, $doc6)) {
            $documentTypeArray = $documentTypes['type6'];
        } else {
            $documentTypeArray = $documentTypes['type7'];
        }

        // Iterate over Document Upload and create records
        foreach ($documentTypeArray as $documentType) {
            /* DocumentUpload::create([
                'name' => $documentType,
                'service_id' => $service->id,
                'branch_id' => $branch_id,
            ]); */
        }
        }
    }
    
    // processing types
    $processingTypes = [
        "type1" => ["Mechanical", "Manual"],
        'type2' => ["Pleasure(A)",
            "Domestic(B)",
            "Community(C)",
            "Commercial(D)"],
        "type3" => ["Vessels less than 500T (Dredger/Houseboat/Tug boat)",
        "Vessels less than 500T (Barges and any other craft)",
        "Vessels more than 500T (Dredger/Houseboat/Tug boat)",
        "Vessels more than 500T (Barges and any other craft)"],
        "type4" => ["SLIPWAY FACILITIES FLAT BOTTOM KEEL SHAPED CRAFT (Craft of 11 - 15m length - Slipping & launching charge)",
        "SLIPWAY FACILITIES FLAT BOTTOM KEEL SHAPED CRAFT (Craft of 11 - 15m length - Slipway/Cradle dues)",
        "SLIPWAY FACILITIES FLAT BOTTOM KEEL SHAPED CRAFT  (Craft of 16 - 20m length - Slipping & launching charge)",
        "SLIPWAY FACILITIES FLAT BOTTOM KEEL SHAPED CRAFT  (Craft of 16 - 20m length - Slipway/Cradle dues)",
        "SLIPWAY FACILITIES FLAT BOTTOM KEEL SHAPED CRAFT  (Craft of 21 - 30m length - Slipping & launching charge)",
        "SLIPWAY FACILITIES FLAT BOTTOM KEEL SHAPED CRAFT  (Craft of 21 - 30m length - Slipway/Cradle dues)",
        "SLIPWAY FACILITIES FLAT BOTTOM KEEL SHAPED CRAFT  (Craft of 31 - 40m length - Slipping & launching charge)",
        "SLIPWAY FACILITIES FLAT BOTTOM KEEL SHAPED CRAFT  (Craft of 31 - 40m length - Slipway/Cradle dues)",
        "SLIPWAY FACILITIES FLAT BOTTOM KEEL SHAPED CRAFT  (Craft of 41m and above length - Slipping & launching charge)",
        "SLIPWAY FACILITIES FLAT BOTTOM KEEL SHAPED CRAFT  (Craft of 41m and above length - Slipway/Cradle dues)",
        "V-SHAPED KEEL BOTTOM CRAFT (Craft of 11 - 15m length - Slipping & launching charge)",
        "V-SHAPED KEEL BOTTOM CRAFT (Craft of 11 - 15m length - Slipway/Cradle dues)",
        "V-SHAPED KEEL BOTTOM CRAFT (Craft of 16 - 20m length - Slipping & launching charge)",
        "V-SHAPED KEEL BOTTOM CRAFT (Craft of 16 - 20m length - Slipway/Cradle dues)",
        "V-SHAPED KEEL BOTTOM CRAFT (Craft of 21 - 30m length - Slipping & launching charge)",
        "V-SHAPED KEEL BOTTOM CRAFT (Craft of 21 - 30m length - Slipway/Cradle dues)",
        "V-SHAPED KEEL BOTTOM CRAFT (Craft of 31 - 40m length - Slipping & launching charge)",
        "V-SHAPED KEEL BOTTOM CRAFT (Craft of 31 - 40m length - Slipway/Cradle dues)",
        "V-SHAPED KEEL BOTTOM CRAFT (Craft of 41 - 50m length - Slipping & launching charge)",
        "V-SHAPED KEEL BOTTOM CRAFT (Craft of 41 - 50m length - Slipway/Cradle dues)",
        "CRANE CHARGES FOR MOBILE & STATIONARY CRANE (80 - 100 Metric-Tons)",
        "CRANE CHARGES FOR MOBILE & STATIONARY CRANE (50 - 80 Metric-Tons)",
        "CRANE CHARGES FOR MOBILE & STATIONARY CRANE (30 - 50 Metric-Tons)",
        "CRANE CHARGES FOR MOBILE & STATIONARY CRANE (20 - 30 Metric-Tons)",
        "CRANE CHARGES FOR MOBILE & STATIONARY CRANE (15 - 20 Metric-Tons)",
        "CRANE CHARGES FOR MOBILE & STATIONARY CRANE (5 - 10 Metric-Tons)",
        "PLANTS AND MACHINERY CHARGES (Heavy duty machines in general - Example, Turning Lathe, Planting, Shaping, Swing machine and Wedding machine)",
        "PLANTS AND MACHINERY CHARGES (Light duty in general - Example, Pneumatic machine, Air compressors, Hand tools)",
        "LABOUR CHARGES",
        "MATERIAL CHARGE",
        "HIRE OF CRAFT (All motor passenger service - M/F Lokoja, M/F New Bussa, M/F Warri, M/F Onitsha and other sister craft)",
        "HIRE OF CRAFT (All motor vehicular ferries - M/F Yelwa, M/F Apapa, M/F Calabar, M/F Baro and other sister craft)",
        "HIRE OF CRAFT (All water buses - W/B Maroko, W/B Jamata, W/B Jebba and other sister craft)",
        "HIRE OF CRAFT (Tug Boats - MT Kainji Dam, Tiga Dam and other sister)",
        "HIRE OF CRAFT (Buoyage vessels - B/V Numan and other Buoyage vessels)",
        "HIRE OF CRAFT (Survey vessel - S/V Woodcock, S/V Woodpecker etc)",
        "HIRE OF CRAFT (Patrol/Survey/Harbour Launches)",
        "OUTBOARD ENGINES (25HP)",
        "OUTBOARD ENGINES (40HP)",
        "OUTBOARD ENGINES (55HP)",
        "OUTBOARD ENGINES (75HP)",
        "OUTBOARD ENGINES (85 - 100HP)",
        "OUTBOARD ENGINES (115 - 155HP)",
        "OUTBOARD ENGINES (Above 155HP)",
        "BOATS (Dinghies)",
        "BOATS (Self-propelled Barge)",
        "AUTHORITY'S FACILITIES (Hire of Jetty)"],
        "type5" => ["Mechanical", "Manual"],
        "type6" => ["Mechanical", "Manual"],
        "type7" => ["N/A"],
        'b_id' => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24],
    ];

   
    // Add 'b_id' property to each service
    $b_ids = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24];

    $dre1 = [1, 29, 57, 85, 113, 141, 169, 197, 225, 253, 281, 309, 337, 365, 393, 421, 449, 477, 505, 533, 561, 589, 617, 645];
    $dre2 = [6, 34, 62, 90, 118, 146, 174, 202, 230, 258, 286, 314, 342, 370, 398, 426, 454, 482, 510, 538, 566, 594, 622, 650];
    $dre3 = [18, 46, 74, 102, 130, 158, 186, 214, 242, 270, 298, 326, 354, 382, 410, 438, 466, 494, 522, 550, 578, 606, 634, 662];
    $dre4 = [24, 52, 80, 108, 136, 164, 192, 220, 248, 276, 304, 332, 360, 388, 416, 444, 472, 500, 528, 556, 584, 612, 640, 668];
    $dre5 = [2, 30, 58, 86, 114, 142, 170, 198, 226, 254, 282, 310, 338, 366, 394, 422, 450, 478, 506, 534, 562, 590, 618, 646];
    $dre6 = [3, 31, 59, 87, 115, 143, 171, 199, 227, 255, 283, 311, 339, 367, 395, 423, 451, 479, 507, 535, 563, 591, 619, 647];
            
    
    // ProcessingType::truncate(); // Uncomment this line if you want to truncate the ProcessingType table before inserting new records
    
    foreach ($b_ids as $branch_id) {
        foreach ($all_services as $service) {
            // Assign branch ID to the service
            $service->branch_id = $branch_id;
    
            // Determine the processing type array based on service ID
        $service_id = $service->id;
        if (in_array($service_id, $dre1)) {
            $processingTypeArray = $processingTypes['type1'];
        } elseif (in_array($service_id, $dre2)) {
            $processingTypeArray = $processingTypes['type2'];
        } elseif (in_array($service_id, $dre3)) {
            $processingTypeArray = $processingTypes['type3'];
        } elseif (in_array($service_id, $dre4)) {
            $processingTypeArray = $processingTypes['type4'];
        } elseif (in_array($service_id, $dre5)) {
            $processingTypeArray = $processingTypes['type5'];
        } elseif (in_array($service_id, $dre6)) {
            $processingTypeArray = $processingTypes['type6'];
        } else {
            $processingTypeArray = $processingTypes['type7'];
        }

        // Iterate over processing types and create records
        foreach ($processingTypeArray as $processingType) {
            /* ProcessingType::create([
                'name' => $processingType,
                'service_id' => $service->id,
                'branch_id' => $branch_id,
            ]); */
        }
        }
    }
    

// processing fees
$processingFees11 = [
    "type1" => ["150000", "7500"],
    'type2' => ["10000",
        "30000",
        "20000",
        "150000"],
    "type5" => ["150000", "7500"],
    "type6" => ["150000", "7500"],
    "type7" => ["150000"],
    'b_id' => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24],
];


// Add 'b_id' property to each service
$b_ids11 = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24];

$dre11 = [1, 29, 57, 85, 113, 141, 169, 197, 225, 253, 281, 309, 337, 365, 393, 421, 449, 477, 505, 533, 561, 589, 617, 645];
$dre21 = [6, 34, 62, 90, 118, 146, 174, 202, 230, 258, 286, 314, 342, 370, 398, 426, 454, 482, 510, 538, 566, 594, 622, 650];
$dre31 = [18, 46, 74, 102, 130, 158, 186, 214, 242, 270, 298, 326, 354, 382, 410, 438, 466, 494, 522, 550, 578, 606, 634, 662];
$dre41 = [24, 52, 80, 108, 136, 164, 192, 220, 248, 276, 304, 332, 360, 388, 416, 444, 472, 500, 528, 556, 584, 612, 640, 668];
$dre51 = [2, 30, 58, 86, 114, 142, 170, 198, 226, 254, 282, 310, 338, 366, 394, 422, 450, 478, 506, 534, 562, 590, 618, 646];
$dre61 = [3, 31, 59, 87, 115, 143, 171, 199, 227, 255, 283, 311, 339, 367, 395, 423, 451, 479, 507, 535, 563, 591, 619, 647];
        

// ProcessingType::truncate(); // Uncomment this line if you want to truncate the ProcessingType table before inserting new records

foreach ($b_ids11 as $branch_id) {
    foreach ($all_services as $service) {
        // Assign branch ID to the service
        $service->branch_id = $branch_id;

        // Determine the processing type array based on service ID
    $service_id = $service->id;
    if (in_array($service_id, $dre11)) {
        $processingTypeArray = $processingFees11['type1'];
    } elseif (in_array($service_id, $dre21)) {
        $processingTypeArray = $processingFees11['type2'];
    } elseif (in_array($service_id, $dre51)) {
        $processingTypeArray = $processingFees11['type5'];
    } elseif (in_array($service_id, $dre61)) {
        $processingTypeArray = $processingFees11['type6'];
    } else {
        $processingTypeArray = $processingFees11['type7'];
    }

    
    foreach ($processingTypeArray as $processingType) {
        
       /*  ProcessingFee::create([
                'amount' => $processingType,
                'service_id' => $service->id,
                'branch_id' => $branch_id,
            ]); */
    }
    }
}
//end

//inspection fees

$inspectionFees11 = [
    "type1" => ["150000", "7500"],
    'type2' => ["30000",
        "15000",
        "30000",
        "150000"],
    "type5" => ["150000", "7500"],
    "type6" => ["150000", "7500"],
    "type7" => ["150000"],
    'b_id' => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24],
];
foreach ($b_ids11 as $branch_id) {
    foreach ($all_services as $service) {
        // Assign branch ID to the service
        $service->branch_id = $branch_id;

        // Determine the processing type array based on service ID
    $service_id = $service->id;
    if (in_array($service_id, $dre11)) {
        $processingTypeArray = $inspectionFees11['type1'];
    } elseif (in_array($service_id, $dre21)) {
        $processingTypeArray = $inspectionFees11['type2'];
    } elseif (in_array($service_id, $dre51)) {
        $processingTypeArray = $inspectionFees11['type5'];
    } elseif (in_array($service_id, $dre61)) {
        $processingTypeArray = $inspectionFees11['type6'];
    } else {
        $processingTypeArray = $inspectionFees11['type7'];
    }

    
    foreach ($processingTypeArray as $processingType) {
        
        InspectionFee::create([
            'amount' => $processingType,
                'service_id' => $service->id,
                'branch_id' => $branch_id,
        ]);
    }
    }
}



$processingTypes1 = [
    "type1" => ["7500", "150000", "7500"],
    "type2" => ["10000",
    "30000",
    "20000",
    "150000"],
    "type3" => ["150000",
    "300000",
    "750000"],
    "type4" => ["150000",
    "225000",
    "300000",
    "400000",
    "500000",
    "150000",
    "250000",
    "400000",
    "32500",
    "300000",
    "225000"],
    "b_id" => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24],
];


// Add 'b_id' property to each service
$b_ids1 = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24];

// Truncate ProcessingFee table
//ProcessingFee::truncate();

foreach ($b_ids1 as $branch_id) {
foreach ($all_services as $service) {
    // Assign branch ID to the service
    $service->branch_id = $branch_id;

    // Determine the processing type array based on service ID
    switch ($service->id) {
        case 1:
            $processingTypeArray = $processingTypes1['type2'];
            break;
        case 15:
            $processingTypeArray = $processingTypes1['type3'];
            break;
        case 21:
            $processingTypeArray = $processingTypes1['type4'];
            break;
        default:
            $processingTypeArray = $processingTypes1['type1'];
            break;
    }

    // Iterate over processing types and create records
    // Fetch existing processing types associated with the service ID
    $existingProcessingTypes = ProcessingType::where('branch_id', $branch_id)->where('service_id', $service->id)->get();

    

    
    // Insert new processing fee records
    
    
    foreach ($existingProcessingTypes as $key11 => $existingProcessingType1) {
        $branchIndex11 = $key11 % count($processingTypes1['b_id']); // Calculate branch index
        $branchId11 = $processingTypes1['b_id'][$branchIndex11];
        $processing_fee = ProcessingFee::where('processing_type_id', $existingProcessingType1->id)->get();
            $processing_fee->each(function ($fee) use ($branchId11) {
                $fee->branch_id = $branchId11;
               // $fee->save();
            });
        }

        //insert new inspection fee records
       // InspectionFee::truncate();
        foreach ($existingProcessingTypes as $existingProcessingType) {
       
            foreach ($processingTypeArray as $key11 => $processingType) {
                
                    /* InspectionFee::create([
                        'amount' => $processingType,
                        'processing_type_id' => $existingProcessingType->id,
                        'service_id' => $service->id,
                    ]); */
        
                    
                }
        
            }
            
            foreach ($existingProcessingTypes as $key11 => $existingProcessingType1) {
                $branchIndex11 = $key11 % count($processingTypes1['b_id']); // Calculate branch index
                $branchId11 = $processingTypes1['b_id'][$branchIndex11];
                $processing_fee = InspectionFee::where('processing_type_id', $existingProcessingType1->id)->get();
                    $processing_fee->each(function ($fee) use ($branchId11) {
                        $fee->branch_id = $branchId11;
                       // $fee->save();
                    });
                }
}



}

        // Re-enable foreign key checks after seeding
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
