<?php
abstract class Controller {
	protected  $layout = 'main';
	protected $model;
	
	protected function getParam($paramName, $params) {
		return (isset($params[$paramName]) ? $params[$paramName] : null);
	}
	protected function loadView($view, $values = array(), $useLayout = false) {
		extract($values);
		$controller = substr(strtolower(get_class($this)), 0, -10);
		$viewFile = "app/views/{$controller}/{$view}.php";
		if(!file_exists($viewFile)) {
			throw new Exception("View '{$view}.php' was not found in 'views/{$controller}' directory.");
		}
		ob_start();
		require_once $viewFile;
		$viewData = ob_get_clean();
		if($useLayout) {
			$layoutFile = "app/views/layouts/{$this->layout}.php";
			if(!file_exists($layoutFile)) {
				throw new Exception("Layout '{$this->layout}.php' was not found in 'views/layouts' directory.");
			}
			require_once $layoutFile;
		}
		else {
			echo $viewData;
		}
	}
	/**
	 * Render a view file and default layout
	 * @param string $view -View file name
	 * @param array $values -Array of values
	 */
	public function render($view, $values = array()) {
		$this->loadView($view, $values, true);
	}
	
	/**
	 * Render a view file without layout
	 * @param string $view -View file name
	 * @param array $values -Array of values
	 */
	public function renderPartial($view, $values = array()) {
		echo $this->loadView($view, $values);
	}
	
	/**
	 * Render a text without view file and layout
	 * @param string $text
	 */
	public function renderText($text) {
		echo $text;
	}
	
	/**
	 * Load model class and create object
	 * @return object $this->model 
	 */
	protected function loadModel($name){
		$path = Base::basePath().'/app/models/'.$name.'_model.php';
		if(file_exists($path)){
			$fileName = $name.'_model';
			return new $fileName;
		}
	}
		
}