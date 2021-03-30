<?php

namespace Drupal\custom_mail_block\Plugin\Block;

    use Drupal\Core\Block\BlockBase;

    /**
     * Provides a 'MymoduleExampleBlock' block.
     *
     * @Block(
     *   id = "mymodule_example_block",
     *   admin_label = @Translation("Example block"),
     *   category = @Translation("Custom example block")
     * )
    */
    class SubscribeFormButton extends BlockBase {

     /**
      * {@inheritdoc}
     */
     public function build() {

       $form = \Drupal::formBuilder()->getForm('Drupal\custom_mail_block\Form\MailBlockForm');

       return $form;
     }
   }