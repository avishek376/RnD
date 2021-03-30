<?php
/**
 * @file
 * Contains \Drupal\custom_mail_block\Form\ResumeForm.
 */
namespace Drupal\custom_mail_block\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Entity\Exception;
use GuzzleHttp\Exception\GuzzleException;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Logger\RfcLoggerTrait;
use Psr\Log\LoggerInterface;
use Drupal\Core\Database;
use Drupal\Core\Link;
use Drupal\Core\Url;
use Drupal\smtp\PHPMailer\PHPMailer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use \Drupal\Core\Cache;

class MailBlockForm extends FormBase {

	public function getFormId() {
   	   return 'mail_Block_form';
  	}
  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

  		$form['mail'] = array(
          '#type' => 'textfield',
          '#title' => t('Mail'),
          '#id' => 'mail',
          
          '#required' => TRUE,
          '#attributes' => array('class' => array('form-control'), 'pattern' => '^[A-Za-z\s]+$', 'title' => t("Enter the mail")),
         );
      	$form['actions']['#type'] = 'actions';
     	$form['actions']['submit'] = array(
        '#type' => 'submit',
        '#value' => $this->t('Submit'),
        '#button_type' => 'primary',
        '#attributes' => array('class' => array('default-btn-class')),
      	);

          //$form['#theme'] = 'resume-template';
          $form['#cache']['max-age'] = 0;
          return $form;
    }

   /**
   * {@inheritdoc}
   */
    public function validateForm(array &$form, FormStateInterface $form_state) {
		      $mailID = \Drupal::entityQuery('user')
				    ->condition('mail', $form_state->getValue('mail'))
				    ->execute();

		  if (!empty($mailID)) {
		   		$form_state->setErrorByName('mail','mail id already exists');
		  }
    }
     /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {}


}
