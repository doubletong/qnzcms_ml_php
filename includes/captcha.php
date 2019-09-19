<?PHP

  require '../vendor/autoload.php';
  use Gregwar\Captcha\CaptchaBuilder;
  use Gregwar\Captcha\PhraseBuilder;

  $phraseBuilder = new PhraseBuilder(4,"0123456789");
  $builder = new CaptchaBuilder(null, $phraseBuilder);
  $builder->setBackgroundColor(255, 255, 255);

  $builder->build();
  header('Content-type: image/jpeg');
  $builder->output();


  session_start();
  $_SESSION['phrase']= $builder->getPhrase();


?>