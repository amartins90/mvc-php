<?php
/**
 *	This framework has made following this tutorial:
 *	https://www.youtube.com/watch?v=6ERdu4k62wI
 *	
 */
namespace app\core;
/*
 *	@author Alexandre J. Martins <contato@ajmartins.com.br>
 *	@package app\core
 */

class View
{
	public $title = '';

	public function renderView($view, $params = [])
	{
		$viewContent = $this->renderOnlyView($view, $params);
		$layoutContent = $this->layoutContent();
		return str_replace('{{content}}', $viewContent, $layoutContent);
	}

	public function renderContent($viewContent)
	{
		$layoutContent = $this->layoutContent();
		return str_replace('{{content}}', $viewContent, $layoutContent);
	}

	protected function layoutContent()
	{
		$layout = Application::$app->layout;
		if (Application::$app->controller) {
			$layout = Application::$app->controller->layout;
		}
		ob_start();
		include_once Application::$root_dir.'/views/layouts/main.php';
		return ob_get_clean();
	}

	protected function renderOnlyView($view, $params)
	{
		foreach ($params as $key => $value) {
			$$key = $value;
		}

		ob_start();
		include_once Application::$root_dir.'/views/'.$view.'.php';
		return ob_get_clean();
	}

	public function setTitle($title)
	{
		$this->title = $title;
	}

	public function getTitle()
	{
		return $this->title;
	}
}