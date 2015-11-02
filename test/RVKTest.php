<?php
include_once __DIR__ . "/../src/connectors/RVK.php";
use \mwAutocompleteExternal\connectors\RVK as RVK;

/**
 * Unit tests for class RVK autocompleter
 * 
 * @author Alvaro.Ortiz
 *
 */
class RVKTest extends PHPUnit_Framework_TestCase {
	public $auto;
	private $query = "Philosophie";
	private $expected = '{"sfautocomplete": [{ "title" : "Mathematik/Biographien, Geschichte und Philosophie der Mathematik"},{ "title" : "Philosophie"},{ "title" : "Philosophie/Allgemeines"},{ "title" : "Philosophie/Geschichte der Philosophie"},{ "title" : "Philosophie/Systematische Philosophie"},{ "title" : "Philosophie/Zeitschriften und Reihenwerke"},{ "title" : "Physik/Allgemeine Nachschlagewerke, Bibliographien, Geschichte und Philosophie der Physik"},{ "title" : "Politologie/Geschichte der politischen Philosophie und der Ideologien"},{ "title" : "Rechtswissenschaft/Allgemeine Rechtslehre und Rechtstheorie, Rechts- und Staatsphilosophie, Rechtssoziologie"},{ "title" : "Rechtswissenschaft/Allgemeine Staatslehre und Staatsphilosophie"},{ "title" : "Theologie und Religionswissenschaften/Philosophie"}]}';
		
	public function setUp() {
		// path to configuration .ini file
		$configPath =  __DIR__ . "/test.ini";
		$ini = parse_ini_file( $configPath );

		// Create a Snoopy (HTML client) instance
		require_once $ini[ 'snoopyPath' ];
		$snoopy = new Snoopy();
		
		// Create importer instance
		$this->auto = new RVK( $snoopy );
	}
	
	public function testCreateInstance() {
		$this->assertNotNull( $this->auto );
	}
	
	public function testSubmit() {
		$resp = $this->auto->search( $this->query );
		$this->assertEquals( $this->expected, $resp );
	} 
}
