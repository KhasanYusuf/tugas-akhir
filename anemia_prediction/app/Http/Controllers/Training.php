<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Phpml\Dataset\CsvDataset;
use Phpml\Classification\NaiveBayes;
use Phpml\Metric\Accuracy;
use View;

class Training extends Controller
{
    public function naiveBayes(Request $request)
    {
        // Load dataset (contoh: data.csv dalam direktori public/datasets)
        $datasetPath = public_path('dataset/anemia.csv');
        $dataset = new CsvDataset($datasetPath, 5,true);

        // Split dataset into training and testing
        $splitRatio = 0.8;
        $datasetCount = count($dataset->getSamples());
        $trainSize = floor($datasetCount * $splitRatio);
        $trainData = array_slice($dataset->getSamples(), 0, $trainSize);
        $testData = array_slice($dataset->getSamples(), $trainSize);
        $trainLabels = array_slice($dataset->getTargets(), 0, $trainSize);
        $testLabels = array_slice($dataset->getTargets(), $trainSize);

        // Initialize and train the logistic regression model (using Naive Bayes as an example)
        $classifier = new NaiveBayes();
        $classifier->train($trainData, $trainLabels);

        // Make predictions
        $predictedLabels = $classifier->predict($testData);
        // dd($testLabels);

        // Calculate accuracy
        $accuracy = Accuracy::score($testLabels, $predictedLabels);

        // Mengirimkan hasil prediksi dan akurasi ke view
        return view('accuracy', [
            'predictedLabel' => $predictedLabels[0], // Menampilkan hanya prediksi pertama sebagai contoh
            'accuracy' => $accuracy,
        ]);
    }
    public function predict(Request $request)
    {
        // Load dataset
        $datasetPath = public_path('dataset/anemia.csv');
        $dataset = new CsvDataset($datasetPath, 5, true); // Kolom terakhir adalah label

        // Split dataset into features and labels
        $samples = $dataset->getSamples();
        $targets = $dataset->getTargets();

        // Menentukan features dan labels
        $features = array_map(function ($sample) {
            return array_slice($sample, 0, 4); // Mengambil atribut pertama hingga kelima sebagai features
        }, $samples);
        $labels = $targets;

        // Prepare input for prediction
        $input = [
            $request->input('gender'),
            $request->input('hemoglobin'),
            $request->input('mch'),
            $request->input('mchc'),
            $request->input('mcv'),
        ];

        // Train the model (using Naive Bayes as an example)
        $classifier = new NaiveBayes();
        $classifier->train($features, $labels);
        // Make prediction
        $predictedLabel = $classifier->predict([$input]);

        // dd($predictedLabel);
        if ($predictedLabel[0]) {
            $result = "Anemia";
        } else {
            $result = "Tidak Anemia";
        }
        
        
        // Store predicted label in session flash
        $request->session()->flash('predictedLabel', $result);

        // Redirect back to form with flash message
        return redirect()->back();
    }
}
