<?php

namespace App\Http\Controllers\Site\dubai;

use App\Models\abudhabi\FAQ;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class faqController extends Controller
{
    public function faqIndex()
    {

        $allfaq = FAQ::where('placefor', 'Dubai')->get()->groupBy('question');


        $uniqueFAQ = collect();
        foreach ($allfaq as $question => $entries) {
            $uniqueFAQ->push($entries->first());
        }

        return view("site.uae.pricelist", [
            'allfaq' => $uniqueFAQ,
        ]);
    }
}
