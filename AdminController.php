<?php
/**
 * @package   ImpressPages
 */


/**
 * Created by PhpStorm.
 * User: mangirdas
 * Date: 6/24/14
 * Time: 4:25 PM
 */

namespace Plugin\Event;


class AdminController
{

    /**
     * WidgetSkeleton.js ask to provide widget management popup HTML. This controller does this.
     * @return \Ip\Response\Json
     * @throws \Ip\Exception\View
     */
    public function widgetPopupHtml()
    {
        $widgetId = ipRequest()->getQuery('widgetId');
        $widgetRecord = \Ip\Internal\Content\Model::getWidgetRecord($widgetId);
        $widgetData = $widgetRecord['data'];

        //create form prepopulated with current widget data
        //$form = $this->managementForm($widgetData);

        //Render form and popup HTML
        $viewData = array(
            'form' => $this->managementForm($widgetData)
        );

        $popupHtml = ipView('view/editPopup.php', $viewData)->render();
        $data = array(
            'popup' => $popupHtml
        );
        //Return rendered widget management popup HTML in JSON format
        return new \Ip\Response\Json($data);
    }

    /**
     * Check widget's posted data and return data to be stored or errors to be displayed
     */
    public function checkForm()
    {
        $data = ipRequest()->getPost();
        $form = $this->managementForm();
        $data = $form->filterValues($data); //filter post data to remove any non form specific items
        $errors = $form->validate($data); //http://www.impresspages.org/docs/form-validation-in-php-3
        if ($errors) {
            //error
            $data = array (
                'status' => 'error',
                'errors' => $errors
            );
        } else {
            //success
            unset($data['aa']);
            unset($data['securityToken']);
            unset($data['antispam']);
            $data = array (
                'status' => 'ok',
                'data' => $data

            );
        }
        return new \Ip\Response\Json($data);
    }

    protected function managementForm($widgetData = array())
    {
        $form = new \Ip\Form();

        $form->setEnvironment(\Ip\Form::ENVIRONMENT_ADMIN);

        //setting hidden input field so that this form would be submitted to 'errorCheck' method of this controller. (http://www.impresspages.org/docs/controller)
        $field = new \Ip\Form\Field\Hidden(
            array(
                'name' => 'aa',
                'value' => 'Event.checkForm'
            )
        );
        $form->addField($field);

		$field = new \Ip\Form\Field\Text(
			array(
				'name' => 'eventDay',
				'label' => __('Event day (eg. "31")', 'Event', false),
				'value' => empty($widgetData['eventDay']) ? null : $widgetData['eventDay']
			));
		$form->addField($field);

		$field = new \Ip\Form\Field\Text(
			array(
				'name' => 'eventMonth',
				'label' => __('Event month (eg. "Jan")', 'Event', false),
				'value' => empty($widgetData['eventMonth']) ? null : $widgetData['eventMonth']
			));
		$form->addField($field);

		$field = new \Ip\Form\Field\Text(
			array(
				'name' => 'eventTimeFrom',
				'label' => __('Event starts at (eg. "18:00")', 'Event', false),
				'value' => empty($widgetData['eventTimeFrom']) ? null : $widgetData['eventTimeFrom']
			));
		$form->addField($field);

		$field = new \Ip\Form\Field\Text(
			array(
				'name' => 'eventTimeTo',
				'label' => __('Event ends at (eg. "23:00")', 'Event', false),
				'value' => empty($widgetData['eventTimeTo']) ? null : $widgetData['eventTimeTo']
			));
		$form->addField($field);

		$field = new \Ip\Form\Field\Text(
			array(
				'name' => 'eventLocation',
				'label' => __('Event location', 'Event', false),
				'value' => empty($widgetData['eventLocation']) ? null : $widgetData['eventLocation']
			));
		$form->addField($field);

		$field = new \Ip\Form\Field\RichText(
			array(
				'name' => 'textPrimary',
				'label' => __('First text field', 'Event', false),
				'value' => empty($widgetData['textPrimary']) ? null : $widgetData['textPrimary']
			));
		$form->addField($field);

		$field = new \Ip\Form\Field\RichText(
			array(
				'name' => 'textSecondary',
				'label' => __('Second text field', 'Event', false),
				'value' => empty($widgetData['textSecondary']) ? null : $widgetData['textSecondary']
			));
		$form->addfield($field);

		$field = new \Ip\Form\Field\Text(
			array(
				'name' => 'buttonText',
				'label' => __('Custom button text', 'Event'),
				'value' => empty($widgetData['buttonText']) ? null : $widgetData['buttonText']
			));
		$form->addfield($field);

		$field = new \Ip\Form\Field\Text(
			array(
				'name' => 'url',
				'label' => __('Button URL', 'Event'),
				'value' => empty($widgetData['url']) ? null : $widgetData['url']
			));
		$field->addValidator('Required');
		$form->addfield($field);

		$field = new \Ip\Form\Field\Text(
			array(
				'name' => 'cssClasses',
				'label' => __('CSS classes (optional)', 'Event', false),
				'value' => empty($widgetData['cssClasses']) ? null : $widgetData['cssClasses']
			));
		$form->addField($field);

        return $form;
    }



}
