<?php

require_once(dirname(__FILE__) . '/Interfaces/Evaluation.class.php');
require_once(dirname(__FILE__) . '/Interfaces/Recommender.class.php');

class RMSE implements Evaluation {
  public static function calculate(Recommender $recommender, $sample) {
    $sum = $i = 0;

    foreach ($sample as $rating) {
      $i++;
    
      $estimate = $recommender->estimateRating($rating->getUserId(), $rating->getItemId());
      $sum += pow(($estimate - $rating->getRating()), 2);
    }
    
    return sqrt($sum / count($sample));
  }
}