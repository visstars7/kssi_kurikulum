<?php defined('BASEPATH') or exit('No direct script access allowed');
/**
 * CodeIgniter DomPDF Library
 *
 * Generate PDF's from HTML in CodeIgniter
 *
 * @packge        CodeIgniter
 * @subpackage        Libraries
 * @category        Libraries
 * @author        Ardianta Pargo
 * @license        MIT License
 * @link        https://github.com/ardianta/codeigniter-dompdf
 */

use Dompdf\Dompdf;

class Pdf extends Dompdf
{
	/**
	 * PDF filename
	 * @var String
	 */
	public $filename;
	public $CI;
	public function __construct()
	{
		parent::__construct();
		$this->filename = "laporan.pdf";
		$this->CI = &get_instance();
	}
	/**
	 * Get an instance of CodeIgniter
	 *
	 * @access    protected
	 * @return    void
	 */


	/**
	 * Load a CodeIgniter view into domPDF
	 *
	 * @access    public
	 * @param    string    $view The view to load
	 * @param    array    $data The view data
	 * @return    void
	 */
	public function load_view($view, $data = array())
	{
		$html = $this->CI->load->view($view, $data, TRUE);
		$this->load_html($html);
		// Render the PDF
		$this->render();
		// Output the generated PDF to Browser
		$this->stream($this->filename, array("Attachment" => false));
	}
}
