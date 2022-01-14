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
    public function __construct()
    {
        parent::__construct();
        $this->filename = "laporan.pdf";
    }
    /**
     * Get an instance of CodeIgniter
     *
     * @access    protected
     * @return    object
     */
    protected function ci()
    {
        return get_instance();
    }
    /**
     * Load a CodeIgniter view into domPDF
     *
     * @access    public
     * @param    string    $view The view to load
     * @param    array    $data The view data
     * @return    void
     */
    // public function generate($html, $filename)
    // {
    //     define('DOMPDF_ENABLE_AUTOLOAD', false);
    //     require_once("./vendor/dompdf/dompdf/dompdf_config.inc.php");

    //     $dompdf = new DOMPDF();
    //     $dompdf->loadHtml($html);
    //     $dompdf->render();
    //     $dompdf->stream($filename . '.pdf', array("Attachment" => 0));
    // }
    public function load_view($view, $data = array())
    {
        $CI = $this->ci();
        $html = $CI->load->view($view, $data, TRUE);
        $this->loadHtml($html);
        // Render the PDF
        $this->render();
        // Output the generated PDF to Browser
        $this->stream($this->filename, array("Attachment" => FALSE));
    }
}
