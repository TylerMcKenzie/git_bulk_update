<?php
/**
 * Generated by Haxe 3.4.7
 */

namespace src;

use \haxe\io\Path;
use \sys\io\Process;
use \php\Boot;
use \php\_Boot\HxException;
use \src\util\Hub;
use \sys\io\File;
use \sys\FileSystem;

class App extends Cli {
	/**
	 * @var string
	 */
	public $branchname;
	/**
	 * @var int
	 */
	public $chunk;
	/**
	 * @var bool
	 */
	public $createPull;
	/**
	 * @var string
	 */
	public $directory;
	/**
	 * @var bool
	 */
	public $dryRun;
	/**
	 * @var string
	 */
	public $fileExtension;
	/**
	 * @var string
	 */
	public $pullRequestMessage;
	/**
	 * @var \Array_hx
	 */
	public $replace;
	/**
	 * @var \Array_hx
	 */
	public $search;


	/**
	 * @return void
	 */
	public function __construct () {
		#src/App.hx:36: characters 34-36
		$this->chunk = 50;
		#src/App.hx:43: characters 8-15
		parent::__construct();
		#src/Cli.hx:19: characters 25-28
		$args = \Sys::args();
		#src/Cli.hx:54: characters 46-146
		$this->directory = ($args->indexOf("-d") > -1 ? ($args->arr[$args->indexOf("-d") + 1] ?? null) : null);
		#src/Cli.hx:54: characters 46-146
		$this->fileExtension = ($args->indexOf("-f") > -1 ? ($args->arr[$args->indexOf("-f") + 1] ?? null) : null);
		#src/Cli.hx:58: characters 71-136
		$_g = new \Array_hx();
		#src/Cli.hx:58: characters 72-135
		$_g2 = 0;
		#src/Cli.hx:58: characters 72-135
		$_g1 = $args->length;
		#src/Cli.hx:58: characters 72-135
		while ($_g2 < $_g1) {
			#src/Cli.hx:58: characters 72-135
			$_g2 = $_g2 + 1;
			#src/Cli.hx:58: characters 77-78
			$i = $_g2 - 1;
			#src/Cli.hx:58: characters 99-135
			if (($args->arr[$i] ?? null) === "-s") {
				#src/Cli.hx:58: characters 126-135
				$_g->arr[$_g->length] = ($args->arr[$i + 1] ?? null);
				#src/Cli.hx:58: characters 126-135
				++$_g->length;
			}
		}

		#src/Cli.hx:58: characters 46-136
		$this->search = $_g;
		#src/Cli.hx:58: characters 71-136
		$_g3 = new \Array_hx();
		#src/Cli.hx:58: characters 72-135
		$_g21 = 0;
		#src/Cli.hx:58: characters 72-135
		$_g11 = $args->length;
		#src/Cli.hx:58: characters 72-135
		while ($_g21 < $_g11) {
			#src/Cli.hx:58: characters 72-135
			$_g21 = $_g21 + 1;
			#src/Cli.hx:58: characters 77-78
			$i1 = $_g21 - 1;
			#src/Cli.hx:58: characters 99-135
			if (($args->arr[$i1] ?? null) === "-r") {
				#src/Cli.hx:58: characters 126-135
				$_g3->arr[$_g3->length] = ($args->arr[$i1 + 1] ?? null);
				#src/Cli.hx:58: characters 126-135
				++$_g3->length;
			}
		}

		#src/Cli.hx:58: characters 46-136
		$this->replace = $_g3;
		#src/Cli.hx:54: characters 46-146
		$this->branchname = ($args->indexOf("-b") > -1 ? ($args->arr[$args->indexOf("-b") + 1] ?? null) : null);
		#src/Cli.hx:42: characters 46-102
		$this->createPull = $args->indexOf("--create-pull") > -1;
		#src/Cli.hx:54: characters 46-146
		$this->pullRequestMessage = ($args->indexOf("--pull-message") > -1 ? ($args->arr[$args->indexOf("--pull-message") + 1] ?? null) : null);
		#src/Cli.hx:42: characters 46-102
		$this->dryRun = $args->indexOf("--dry") > -1;

	}


	/**
	 * @param string $msg
	 * 
	 * @return void
	 */
	public function error ($msg = "") {
		#src/App.hx:114: lines 114-117
		if ($msg === null) {
			#src/App.hx:114: lines 114-117
			$msg = "";
		}
		#src/App.hx:115: characters 8-24
		\Sys::println($msg);
		#src/App.hx:116: characters 8-19
		exit(1);
	}


	/**
	 * @param string $directory
	 * @param \Array_hx $files
	 * 
	 * @return \Array_hx
	 */
	public function getAllFiles ($directory, $files) {
		#src/App.hx:121: lines 121-139
		if (file_exists($directory)) {
			#src/App.hx:122: lines 122-136
			if (is_dir($directory)) {
				#src/App.hx:123: lines 123-133
				$_g = 0;
				#src/App.hx:123: lines 123-133
				$_g1 = FileSystem::readDirectory($directory);
				#src/App.hx:123: lines 123-133
				while ($_g < $_g1->length) {
					#src/App.hx:123: characters 21-25
					$file = ($_g1->arr[$_g] ?? null);
					#src/App.hx:123: lines 123-133
					$_g = $_g + 1;
					#src/App.hx:124: characters 20-64
					$filePath = Path::join(\Array_hx::wrap([
						$directory,
						$file,
					]));
					#src/App.hx:126: lines 126-132
					if (!is_dir($filePath)) {
						#src/App.hx:127: lines 127-129
						if (Path::extension($filePath) === $this->fileExtension) {
							#src/App.hx:128: characters 28-48
							$files->arr[$files->length] = $filePath;
							#src/App.hx:128: characters 28-48
							++$files->length;
						}
					} else {
						#src/App.hx:131: characters 24-80
						$this->getAllFiles(Path::addTrailingSlash($filePath), $files);
					}
				}
			} else {
				#src/App.hx:135: characters 16-37
				$files->arr[$files->length] = $directory;
				#src/App.hx:135: characters 16-37
				++$files->length;
			}
		} else {
			#src/App.hx:138: characters 11-64
			$this->error("Directory '" . ($directory??'null') . "' does not exist");
		}
		#src/App.hx:141: characters 8-20
		return $files;
	}


	/**
	 * @return void
	 */
	public function run () {
		#src/App.hx:49: lines 49-51
		if ($this->directory === null) {
			#src/App.hx:50: characters 12-52
			$this->error("Test directory is required");
		}
		#src/App.hx:53: lines 53-55
		if ($this->search->length !== $this->replace->length) {
			#src/App.hx:54: characters 12-144
			$this->error("Each search should have an equivalent replace. Got " . ($this->search->length??'null') . " searches and " . ($this->replace->length??'null') . " replaces.");
		}
		#src/App.hx:57: characters 8-74
		$files = $this->getAllFiles($this->directory, new \Array_hx());
		#src/App.hx:59: characters 8-22
		$range = 0;
		#src/App.hx:62: lines 62-110
		$_g_index = null;
		#src/App.hx:62: lines 62-110
		$_g_chunkSize = null;
		#src/App.hx:62: lines 62-110
		$_g_array = null;
		#src/App.hx:62: characters 27-71
		$_g_index = 0;
		#src/App.hx:62: characters 27-71
		$_g_array = $files;
		#src/App.hx:62: characters 27-71
		$_g_chunkSize = $this->chunk;
		#src/App.hx:62: lines 62-110
		while ($_g_index < $_g_array->length) {
			#src/App.hx:62: lines 62-110
			$_g_index1 = $_g_index;
			#src/App.hx:62: lines 62-110
			$_g_index = $_g_index + $_g_chunkSize;
			#src/App.hx:62: lines 62-110
			$filesChunk = $_g_array->slice($_g_index1, $_g_index);
			#src/App.hx:63: lines 63-65
			if ($this->dryRun || !$this->createPull) {
				#src/App.hx:64: characters 16-83
				$this->searchAndReplaceInFiles($this->search, $this->replace, $filesChunk);
			}
			#src/App.hx:67: lines 67-78
			if ($this->dryRun) {
				#src/App.hx:68: characters 16-78
				$testProcess = new Process("git", \Array_hx::wrap([
					"diff",
					"--name-only",
				]));
				#src/App.hx:70: lines 70-75
				if (strlen($testProcess->stdout->readAll()->toString()) > 0) {
					#src/App.hx:71: characters 20-48
					\Sys::command("git", \Array_hx::wrap(["diff"]));
					#src/App.hx:72: characters 20-68
					\Sys::command("git", \Array_hx::wrap([
						"checkout",
						$this->directory,
					]));
					#src/App.hx:73: characters 20-39
					$testProcess->close();
					#src/App.hx:74: characters 20-26
					return;
				}
				#src/App.hx:77: characters 16-35
				$testProcess->close();
			}
			#src/App.hx:81: lines 81-109
			if ($this->createPull && !$this->dryRun) {
				#src/App.hx:82: characters 16-34
				$start = $range;
				#src/App.hx:83: characters 26-45
				$range = $range + $this->chunk;
				#src/App.hx:83: characters 16-46
				$end = $range;
				#src/App.hx:85: characters 16-117
				if ($this->branchname === null) {
					#src/App.hx:85: characters 45-117
					$this->error("'-b' branch flag is required when creating a pull request.");
				}
				#src/App.hx:88: characters 16-86
				$branchnameRange = ($this->branchname??'null') . "_batch_" . ($start??'null') . "_" . ($end??'null');
				#src/App.hx:90: lines 90-108
				if ((new Process("git", \Array_hx::wrap([
					"checkout",
					"-b",
					$branchnameRange,
					"master",
				])))->exitCode() === 0) {
					#src/App.hx:92: characters 20-87
					$this->searchAndReplaceInFiles($this->search, $this->replace, $filesChunk);
					#src/App.hx:94: characters 20-109
					(new Process("git", \Array_hx::wrap([
						"commit",
						"-am",
						"Adding update for batch " . ($start??'null') . " - " . ($end??'null'),
					])))->exitCode();
					#src/App.hx:95: characters 20-92
					(new Process("git", \Array_hx::wrap([
						"push",
						"-u",
						"origin",
						$branchnameRange,
					])))->exitCode();
					#src/App.hx:97: characters 20-99
					$message = ($this->pullRequestMessage !== null ? $this->pullRequestMessage : "");
					#src/App.hx:99: lines 99-103
					Hub::pullRequest(\Array_hx::wrap([
						"-m",
						"Update batch " . ($start??'null') . " - " . ($end??'null'),
						"-m",
						$message,
					]), function ($process) {
						#src/App.hx:100: characters 24-70
						echo(\Std::string($process->stdout->readAll()->toString()));
						#src/App.hx:101: characters 24-42
						$process->exitCode();
						#src/App.hx:102: characters 24-39
						$process->close();
					});
					#src/App.hx:105: characters 20-68
					(new Process("git", \Array_hx::wrap([
						"checkout",
						"-",
					])))->exitCode();
				} else {
					#src/App.hx:107: characters 20-81
					$this->error("Could not checkout branch '" . ($branchnameRange??'null') . "'.");
				}
			}
		}

	}


	/**
	 * @param string $search
	 * @param string $replace
	 * @param string $filePath
	 * 
	 * @return void
	 */
	public function searchAndReplaceInFile ($search = "", $replace = "", $filePath) {
		#src/App.hx:145: lines 145-168
		if ($search === null) {
			#src/App.hx:145: lines 145-168
			$search = "";
		}
		#src/App.hx:145: lines 145-168
		if ($replace === null) {
			#src/App.hx:145: lines 145-168
			$replace = "";
		}
		#src/App.hx:146: lines 146-148
		if (!file_exists($filePath)) {
			#src/App.hx:147: characters 12-60
			$this->error("File: '" . ($filePath??'null') . "' does not exist");
		}
		#src/App.hx:150: lines 150-155
		if ((strlen($search) === 0) || (strlen($replace) === 0)) {
			#src/App.hx:154: characters 12-57
			$this->error("Search and Replace are required");
		}
		#src/App.hx:157: characters 8-52
		$fileContent = File::getContent($filePath);
		#src/App.hx:158: characters 8-48
		$searchRegex = new \EReg($search, "g");
		#src/App.hx:159: characters 8-50
		$newLineRegex = new \EReg("\\\\n", "g");
		#src/App.hx:161: characters 8-99
		$updatedContent = $searchRegex->replace($fileContent, $newLineRegex->replace($replace, "\x0A"));
		#src/App.hx:163: lines 163-167
		try {
			#src/App.hx:164: characters 12-54
			File::saveContent($filePath, $updatedContent);
		} catch (\Throwable $__hx__caught_e) {
			$__hx__real_e = ($__hx__caught_e instanceof HxException ? $__hx__caught_e->e : $__hx__caught_e);
			if (is_string($__hx__real_e)) {
				$errorMessage = $__hx__real_e;
				#src/App.hx:166: characters 12-36
				$this->error($errorMessage);
			} else  throw $__hx__caught_e;
		}
	}


	/**
	 * @param \Array_hx $searches
	 * @param \Array_hx $replaces
	 * @param \Array_hx $files
	 * 
	 * @return void
	 */
	public function searchAndReplaceInFiles ($searches, $replaces, $files) {
		#src/App.hx:172: lines 172-176
		$_g = 0;
		#src/App.hx:172: lines 172-176
		while ($_g < $files->length) {
			#src/App.hx:172: characters 13-17
			$file = ($files->arr[$_g] ?? null);
			#src/App.hx:172: lines 172-176
			$_g = $_g + 1;
			#src/App.hx:173: lines 173-175
			$_g2 = 0;
			#src/App.hx:173: lines 173-175
			$_g1 = $searches->length;
			#src/App.hx:173: lines 173-175
			while ($_g2 < $_g1) {
				#src/App.hx:173: lines 173-175
				$_g2 = $_g2 + 1;
				#src/App.hx:173: characters 17-18
				$i = $_g2 - 1;
				#src/App.hx:174: characters 16-75
				$this->searchAndReplaceInFile(($searches->arr[$i] ?? null), ($replaces->arr[$i] ?? null), $file);
			}

		}
	}
}


Boot::registerClass(App::class, 'src.App');
