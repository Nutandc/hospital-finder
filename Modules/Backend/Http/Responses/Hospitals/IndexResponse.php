<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 8/8/2018
 * Time: 4:05 PM
 */

namespace Modules\Backend\Http\Responses\Hospitals;


use Illuminate\Contracts\Support\Responsable;

class IndexResponse implements Responsable
{
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function toResponse($request)
    {
        $disease = ['Fungal infection', 'Allergy', 'GERD', 'Chronic cholesterol', 'Drug Reaction',
            'Peptic ulcer disease', 'AIDS', 'Diabetes', 'Gastroenteritis', 'Bronchial Asthma', 'Hypertension',
            ' Migraine', 'Cervical spondylosis',
            'Paralysis (brain hemorrhage)', 'Jaundice', 'Malaria', 'Chicken pox', 'Dengue', 'Typhoid', 'hepatitis A',
            'Hepatitis B', 'Hepatitis C', 'Hepatitis D', 'Hepatitis E', 'Alcoholic hepatitis', 'Tuberculosis',
            'Common Cold', 'Pneumonia', 'Dimorphic hemorrhoids(piles)',
            'Heart Attack', 'Varicoseveins', 'Hypothyroidism', 'Hyperthyroidism', 'Hypoglycemia', 'Osteoarthristis',
            'Arthritis', '(vertigo) Paroymsal  Positional Vertigo', 'Acne', 'Urinary tract infection', 'Psoriasis',
            'Impetigo'];
        return view('backend::hospitals.index')
            ->with('hospitals', $this->model->sortByDesc('created_at'))
            ->with('diseases', array_combine($disease,$disease));
        /*return response()->json($this->accountTypeCategories);*/
    }
}
