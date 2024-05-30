<?php
header('Content-type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="en-US" dir="LTR">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>XenForo® system requirements test</title>

	<style>
		html
		{
			background: #EEEEEE;
			font: 15px / 1.4 sans-serif;
			font-family: 'Segoe UI', 'Helvetica Neue', Helvetica, Roboto, Oxygen, Ubuntu, Cantarell, 'Fira Sans', 'Droid Sans', sans-serif;
			color: #141414;
			margin: 0;
			padding: 0;
			word-wrap: break-word;
		}

		body
		{
			overflow-y: scroll !important;
			margin: 0;
		}

		.p-pageWrapper
		{
			position: relative;
			display: flex;
			flex-direction: column;
			min-height: 100vh;
		}

		.p-header
		{
			color: #BCDEF5;
			background: #185886;
		}

		.p-header-inner
		{
			max-width: 1200px;
			padding: 0 10px;
			margin: 0 auto;
		}

		.p-header-content
		{
			padding: 6px 0;

			display: flex;
			flex-wrap: wrap;
			justify-content: space-between;
			align-items: center;
			max-width: 100%;
		}

		.p-header-logo
		{
			vertical-align: middle;
			margin-right: auto;
		}

		.p-header-logo.p-header-logo--image img
		{
			vertical-align: bottom;
			max-width: 100%;
			max-height: 200px;
		}

		.p-body
		{
			display: flex;
			align-items: stretch;
		}

		.p-body-inner
		{
			display: flex;
			flex-direction: column;
			width: 100%;
		}

		html .p-body-main
		{
			margin-bottom: auto
		}

		.p-body
		{
			flex-grow: 1;
		}

		.p-body-inner
		{
			max-width: 1200px;
			padding: 0 10px;
			margin: 0 auto;
			padding-top: 10px;
			padding-bottom: 20px;
		}

		.p-body-inner::before,
		.p-body-inner::after
		{
			content: " ";
			display: table;
		}

		.p-body-inner::after
		{
			clear: both;
		}

		.p-body-main
		{
			display: table;
			table-layout: fixed;
			width: 100%;
			margin-top: 10px;
		}

		.p-body-content
		{
			display: table-cell;
			vertical-align: top;
		}

		.p-body-content > *:first-child
		{
			margin-top: 0;
		}

		.p-body-content > *:last-child
		{
			margin-bottom: 0;
		}

		.p-title
		{
			display: flex;
			flex-wrap: wrap;
			align-items: center;
			max-width: 100%;
		}

		.p-title-value
		{
			padding: 0;
			margin: 0;
			font-size: 24px;
			font-weight: 400;
			min-width: 0;
		}

		.blockMessage
		{
			margin: 20px 0;
			padding: 6px 10px;
			color: #141414;
			background: #FEFEFE;

			border-width: 1px;
			border-style: solid;
			border-top-color: #e4e4e4;
			border-right-color: #dcdcdc;
			border-bottom-color: #d2d2d2;
			border-left-color: #dcdcdc;
			border-radius: 4px;
		}

		.blockMessage.blockMessage--success
		{
			border-left: 3px solid #63b265;
			background: #daf3d8;
			color: #3d793f;
		}

		.blockMessage.blockMessage--error
		{
			border-left: 3px solid #c84448;
			background: #fde9e9;
			color: #c84448;
		}

		.blockMessage > *:last-child
		{
			margin-bottom: 0;
		}

		.p-footer
		{
			font-size: 13px;
			color: #bcdef5;
			background: #0f3652;
		}

		.p-footer-inner
		{
			max-width: 1200px;
			padding: 0 10px;
			margin: 0 auto;
			padding-top: 6px;
			padding-bottom: 10px;
		}

		.p-footer-copyright
		{
			margin-top: 20px;
			text-align: center;
			font-size: 11px;
		}

		.u-concealed
		{
			text-decoration: inherit !important;
			color: inherit !important;
		}
	</style>
</head>
<body>
<div class="p-pageWrapper">
	<header class="p-header">
		<div class="p-header-inner">
			<div class="p-header-content">
				<div class="p-header-logo p-header-logo--image">
					<a href="https://xenforo.com" target="_blank">
						<img width="100" height="36" alt="logo" src="data:image/svg+xml;base64,PHN2ZyB2aWV3Qm94PSIwIDAgMzkwIDgyIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIGZpbGwtcnVsZT0iZXZlbm9kZCIgY2xpcC1ydWxlPSJldmVub2RkIiBzdHJva2UtbGluZWpvaW49InJvdW5kIiBzdHJva2UtbWl0ZXJsaW1pdD0iMiI+PHBhdGggZD0iTTI3LjA1IDQwLjc3N2wxMC4zNjgtMTYuNzUyaDkuODFMMzEuNDQ1IDQ2LjkzNm0tMi40MjcgMy41MjNsMjAuMzgzIDI5LjcyMmgtOS44MUwyNC43MjkgNTcuNTA4IDkuODEgODAuMTgxSDBMMjAuMzgzIDUwLjgxIDIuMTE1IDI0LjAyNWg5Ljg2OGwxMi43NDYgMjAuNTAxTTU5Ljc3MiA0Ny4yMjdjMC0xLjI2NC4wNDItMi40MjMuMTAyLTMuNTMxbC4wMTMtLjQwNWguMDExYy4zMTQtNC45ODIgMS4yNTMtOC4zNTkgMi44NDEtMTAuMDczIDEuOTc3LTIuMTM0IDYuMjk0LTMuMjAyIDEyLjk1Mi0zLjIwMiA2LjYxOCAwIDEwLjkyNi45MTEgMTIuOTIzIDIuNzMxIDEuODQ5IDEuNjg2IDIuODMxIDUuMjE3IDIuOTY4IDEwLjU0NGg4LjI5NGMtLjUxMy03LjM5Mi0yLjA1Mi0xMi40MjgtNC42MjQtMTUuMDk1LTMuMjEyLTMuMzI4LTkuOTg2LTQuOTkzLTIwLjMyNS00Ljk5My05LjQ3NyAwLTE1Ljg0IDEuOTE4LTE5LjA5IDUuNzU2LTMuMjUxIDMuODM4LTQuODc2IDExLjM1Ny00Ljg3NiAyMi41NTUgMCAxMi4xMDMgMS42MTUgMjAuMDQyIDQuODQ3IDIzLjgyMSAzLjIzIDMuNzggMTAuMDE1IDUuNjY5IDIwLjM1MiA1LjY2OSA4Ljg5IDAgMTUuMTA2LTEuMTY1IDE4LjY1MS0zLjQ5NSAzLjU0NC0yLjMzIDUuMzE2LTYuNDEzIDUuMzE2LTEyLjI0OGwtLjA1OC0yLjA1NmgtOC40djEuNzYyYzAgMy44MzgtLjk5IDYuMzM1LTIuOTY3IDcuNDktMS45NzcgMS4xNTYtNi4yNzYgMS43MzMtMTIuODk0IDEuNzMzLTYuOTcxIDAtMTEuNDA2LTEuMjE0LTEzLjMwNS0zLjY0MS0xLjg5OS0yLjQyOS0yLjg0OC04LjA2OC0yLjg0OC0xNi45MThoNDAuNDE0di00LjQwN2MwLS42ODEtLjAwNy0xLjM0Ny0uMDItMS45OTdINTkuNzcyeiIgZmlsbD0iI2E1Y2FlNCIgZmlsbC1ydWxlPSJub256ZXJvIi8+PHBhdGggZD0iTTU5Ljg4NiA0My4yOTJsLS4wMTEuNDAzYy4wMDctLjEzNS4wMTUtLjI2OS4wMjQtLjQwM2gtLjAxM3pNMTM0Ljk5MyAzMC4wMTZjNS4yNDggMCA4Ljc5MS44MzIgMTAuNjMyIDIuNDk3IDEuODQxIDEuNjY1IDIuNzYxIDQuOTA1IDIuNzYxIDkuNzIxdjEuMDU3aDguMjE2Yy0uMDQzLTcuNzg3LTEuNDU1LTEzLjA4My00LjI1MS0xNS44NTktMi44MzktMi44Mi04LjI3My00LjIyOS0xNi4zMDEtNC4yMjktOS45NDcgMC0xNi4xNzMgMi44NzktMTguNjc5IDguNjM0bC0uMjM1LS4xNzYuMjM1LTcuNjM2aC03LjkzdjE5LjI2Nmg4LjQxNWMxLjA0NC04Ljg0IDYuNzQ1LTEzLjI3NSAxNy4xMzctMTMuMjc1IiBmaWxsPSIjYTVjYWU0IiBmaWxsLXJ1bGU9Im5vbnplcm8iLz48cGF0aCBmaWxsPSIjYTVjYWU0IiBkPSJNMTA5LjQ0MSA0Ny4yMjdoOC4yMjR2MzIuOTU0aC04LjIyNHpNMTQ4LjM4NiA0Ny4yMjdoOC4yMjR2MzIuOTU0aC04LjIyNHoiLz48cGF0aCBkPSJNMTc3LjMyIDM1LjY1NVY3LjYzN2g0MC4xMjFWMGgtNDkuMTY3djQzLjI5Mmg0Ni44NWMuMjU4LTIuOTM2LjY2My01LjQ3NCAxLjIwNC03LjYzN0gxNzcuMzJ6IiBmaWxsPSIjZmZmIiBmaWxsLXJ1bGU9Im5vbnplcm8iLz48cGF0aCBmaWxsPSIjZmZmIiBkPSJNMTY4LjI3NCA0Ny4yMjdoOS4wNDZ2MzIuOTU0aC05LjA0NnoiLz48cGF0aCBkPSJNMjYyLjQ2OCA1Mi4xMDNjMCA5Ljk4Ni0uODczIDE2LjE2NS0yLjYxNCAxOC41MzMtMS43NDMgMi4zNy02LjI3NiAzLjU1NC0xMy41OTkgMy41NTQtNy4yODMgMC0xMS43OTgtMS4xODQtMTMuNTQtMy41NTQtMS43NDMtMi4zNjgtMi42MTQtOC41NDctMi42MTQtMTguNTMzIDAtMS43NDMuMDI4LTMuMzY0LjA4Mi00Ljg3NmgtOC42MThjLS4wNjQgMS41NDMtLjA5OCAzLjE2Mi0uMDk4IDQuODc2IDAgMTIuMDYyIDEuNTQ2IDE5Ljg5NCA0LjY0MSAyMy40OTcgMy4wOTEgMy42MDMgOS44MSA1LjQwNCAyMC4xNDcgNS40MDQgMTAuMzc3IDAgMTcuMTEzLTEuODAxIDIwLjIwOC01LjQwNCAzLjA5My0zLjYwMyA0LjY0MS0xMS40MzUgNC42NDEtMjMuNDk3IDAtMS43MTQtLjAzNi0zLjMzMy0uMDk4LTQuODc2aC04LjYxOWMuMDU0IDEuNTEyLjA4MSAzLjEzMy4wODEgNC44NzZNMjMyLjcxNSAzMy41N2MxLjc0My0yLjM2OCA2LjI1Ny0zLjU1NCAxMy41NC0zLjU1NCA3LjMyMiAwIDExLjg1NyAxLjE4NiAxMy41OTkgMy41NTQgMS4xNTQgMS41NjkgMS45MjIgNC44MTYgMi4zMTIgOS43MjFoOC41OTdjLS42MDktNy4xNS0yLjAzOS0xMi4wNTEtNC4zMDEtMTQuNjg0LTMuMDk0LTMuNjAzLTkuODMtNS40MDUtMjAuMjA3LTUuNDA1LTEwLjMzOCAwLTE3LjA1NSAxLjgwMi0yMC4xNDcgNS40MDUtMi4yNjEgMi42MzMtMy42OTIgNy41MzQtNC4zMDIgMTQuNjg0aDguNTk2Yy4zOTEtNC45MDUgMS4xNi04LjE1MiAyLjMxMy05LjcyMSIgZmlsbD0iI2ZmZiIgZmlsbC1ydWxlPSJub256ZXJvIi8+PHBhdGggZmlsbD0iI2ZmZiIgZD0iTTI3OC44NDggNDcuMjI3aDguMjI0djMyLjk1NGgtOC4yMjR6Ii8+PHBhdGggZD0iTTMwMC44MTggMjkuNTQ2YzYuMjY1IDAgOS4zOTggMi44NzkgOS4zOTggOC42MzYgMCAuNTA5LS4wNTcgMS41MDctLjE3NiAyLjk5NWwtLjI0NyAyLjExNWg4LjEwNmwuMTMtNC41ODJjMC0xMC42NTItNS4xNjktMTUuOTc4LTE1LjUwNy0xNS45NzgtNy40ODEgMC0xMi44NDYgMi42NDQtMTYuMDk1IDcuOTNsLS4xNzYtLjE3Ni44MjItNi40NjFoLTguMjI1djE5LjI2N2g4LjM3N2MuODMxLTkuMTUzIDUuMzUyLTEzLjc0NiAxMy41OTMtMTMuNzQ2TTM2OC4wMzMgMjguNjA3Yy0zLjA5NS0zLjYwMi05LjgzLTUuNDA1LTIwLjIwNy01LjQwNS0xMC4zMzggMC0xNy4wNTUgMS44MDMtMjAuMTQ4IDUuNDA1LTIuMjYgMi42MzMtMy42OTEgNy41MzQtNC4zIDE0LjY4NGg4LjU5NGMuMzkxLTQuOTA1IDEuMTYxLTguMTUzIDIuMzE0LTkuNzIxIDEuNzQzLTIuMzY5IDYuMjU3LTMuNTU0IDEzLjU0LTMuNTU0IDcuMzIyIDAgMTEuODU2IDEuMTg1IDEzLjU5OSAzLjU1NCAxLjc0MiAyLjM3IDIuNjEzIDguNTQ3IDIuNjEzIDE4LjUzM3MtLjg3MSAxNi4xNjQtMi42MTMgMTguNTMzYy0xLjc0MyAyLjM2OS02LjI3NyAzLjU1NC0xMy41OTkgMy41NTQtNy4yODMgMC0xMS43OTctMS4xODUtMTMuNTQtMy41NTQtMS43NDMtMi4zNjktMi42MTQtOC41NDctMi42MTQtMTguNTMzIDAtMS43NDQuMDI4LTMuMzY0LjA4MS00Ljg3NmgtOC42MTdjLS4wNjQgMS41NDMtLjA5OCAzLjE2My0uMDk4IDQuODc2IDAgMTIuMDYyIDEuNTQ2IDE5Ljg5MyA0LjY0IDIzLjQ5NiAzLjA5MyAzLjYwMyA5LjgxIDUuNDA1IDIwLjE0OCA1LjQwNSAxMC4zNzcgMCAxNy4xMTItMS44MDIgMjAuMjA3LTUuNDA1IDMuMDk0LTMuNjAzIDQuNjQxLTExLjQzNCA0LjY0MS0yMy40OTYgMC0xMi4wNjEtMS41NDctMTkuODkzLTQuNjQxLTIzLjQ5NiIgZmlsbD0iI2ZmZiIgZmlsbC1ydWxlPSJub256ZXJvIi8+PGc+PHBhdGggZD0iTTM4MC40ODUgMjYuODIzaDIuNTE3YzEuMTA2IDAgMS42NTgtLjQ0NyAxLjY1OC0xLjMzOSAwLS42NTktLjA4My0xLjA4NS0uMjUtMS4yNzktLjE2Ni0uMTkzLS41MzMtLjI4OS0xLjA5OS0uMjg5aC0yLjgyNnYyLjkwN3ptLTEuMDE5IDMuOTU1di03Ljc4MWgzLjgzNmMxLjU4NCAwIDIuMzc3Ljc2IDIuMzc3IDIuMjc4IDAgMS4xMDUtLjM1NiAxLjc3OC0xLjA2OSAyLjAxNy42MzkuMjIuOTYuNzIuOTYgMS40OTh2MS45ODhoLTEuMDJWMjguOTljMC0uODMyLS4zOC0xLjI0OC0xLjEzOS0xLjI0OGgtMi45MjZ2My4wMzZoLTEuMDE5em0zLjExNy0xMC4wNThjLTEuNjg2IDAtMy4xMjQuNjA4LTQuMzE2IDEuODIzLTEuMTkyIDEuMjE1LTEuNzg4IDIuNjg1LTEuNzg4IDQuNDFzLjU5NiAzLjE5NyAxLjc4OCA0LjQxNWMxLjE5MiAxLjIxOSAyLjYzIDEuODI4IDQuMzE2IDEuODI4IDEuNjc3IDAgMy4xMTItLjYwOSA0LjI5OS0xLjgyOCAxLjE5LTEuMjE4IDEuNzg0LTIuNjkgMS43ODQtNC40MTVzLS41OTMtMy4xOTUtMS43NzgtNC40MWMtMS4xODUtMS4yMTUtMi42MjEtMS44MjMtNC4zMDUtMS44MjNtLjAwOS0uNzJjMS45MDUgMCAzLjUzNC42OCA0Ljg4OSAyLjAzOCAxLjM1NiAxLjM1OCAyLjAzNCAyLjk5NyAyLjAzNCA0LjkxNSAwIDEuOTE4LS42NzggMy41NTgtMi4wMzQgNC45Mi0xLjM1NSAxLjM2MS0yLjk4NCAyLjA0Mi00Ljg4OSAyLjA0Mi0xLjkyNCAwLTMuNTY2LS42NzgtNC45MjUtMi4wMzgtMS4zNTgtMS4zNTgtMi4wMzctMi45OTktMi4wMzctNC45MjQgMC0xLjkxOC42NzktMy41NTcgMi4wMzctNC45MTUgMS4zNTktMS4zNTggMy4wMDEtMi4wMzggNC45MjUtMi4wMzgiIGZpbGw9IiNkN2VkZmMiIGZpbGwtcnVsZT0ibm9uemVybyIvPjwvZz48L3N2Zz4=">
					</a>
				</div>
			</div>
		</div>
	</header>
	<div class="p-body">
		<div class="p-body-inner">
			<div class="p-title ">
				<h1 class="p-title-value">XenForo<sup>&reg;</sup> system requirements test</h1>
			</div>
			<div class="p-body-main">
				<div class="p-body-content">
					<?php

					$errors = array();
					$warnings = array();
					$disabled = array();

					$phpVersion = phpversion();
					if (version_compare($phpVersion, '7.0.0', '<'))
					{
						$errors['phpVersion'] = 'PHP 7.0.0 or newer is required. ' . $phpVersion . ' does not meet this requirement. Please ask your host to upgrade PHP.';
					}
					if (version_compare($phpVersion, '8.2.0', '<'))
					{
						$warnings['phpVersion'] = 'We recommend PHP 8.2 or newer but you are currently running PHP ' . $phpVersion . '. If possible, please ask your host to upgrade PHP.';
					}

					if (!function_exists('mysqli_connect'))
					{
						$errors['mysqlPhp'] = 'The required PHP extension MySQLi could not be found. Please ask your host to install this extension.';
					}

					if (!function_exists('iconv'))
					{
						$errors['iconv'] = 'The required PHP extension Iconv could not be found. Please ask your host to install this extension.';
					}

					if (!function_exists('ctype_alnum'))
					{
						$errors['ctype'] = 'The required PHP extension Ctype could not be found. Please ask your host to install this extension.';
					}

					if (!function_exists('fpassthru'))
					{
						$errors['fpassthru'] = 'The required PHP function fpassthru is not installed or has been disabled. Please ask your host to ensure that fpassthru is available.';
					}

					if (!function_exists('gd_info'))
					{
						$errors['gd'] = 'The required PHP extension GD could not be found. Please ask your host to install this extension.';
					}
					else if (!function_exists('imagecreatefromjpeg'))
					{
						$errors['gdJpeg'] = 'The required PHP extension GD was found, but JPEG support is missing. Please ask your host to add support for JPEG images.';
					}

					if (!function_exists('preg_replace'))
					{
						$errors['pcre'] = 'The required PHP extension PCRE could not be found. Please ask your host to install this extension.';
					}

					if (!function_exists('spl_autoload_register'))
					{
						$errors['spl'] = 'The required PHP extension SPL could not be found. Please ask your host to install this extension.';
					}

					if (!function_exists('json_encode'))
					{
						$errors['json'] = 'The required PHP extension JSON could not be found. Please ask your host to install this extension.';
					}

					if (!extension_loaded('curl'))
					{
						$errors['curl'] = 'The required PHP extension cURL could not be found. Please ask your host to install this extension.';
					}

					if (!class_exists('DOMDocument') || !class_exists('SimpleXMLElement'))
					{
						$errors['xml'] = 'The required PHP extensions for XML handling (DOM and SimpleXML) could not be found. Please ask your host to install this extension.';
					}

					if (!class_exists('ZipArchive', false))
					{
						$warnings['ziparchive'] = 'ZipArchive support is recommended for installing add-ons, styles and XenForo upgrades.';
					}

					if (PHP_INT_SIZE === 4)
					{
						$warnings['phpMaxInt'] = 'Your PHP install does not support 64-bit integers. Please ask your host to upgrade to a 64-bit version of PHP.';
					}

					if (extension_loaded('sockets'))
					{
						if (!defined('AF_INET6'))
						{
							$warnings['ipv6'] = 'Your PHP install does not support IPv6. Please ask your host to enable IPv6 support.';
						}
					}
					else
					{
						$warnings['ipv6'] = 'Your PHP install may not support IPv6. Please ask your host to ensure IPv6 support is enabled.';
					}

					$pushMissing = [];
					foreach (['gmp', 'mbstring', 'openssl'] AS $pushExtension)
					{
						if (!extension_loaded($pushExtension))
						{
							$pushMissing[] = $pushExtension;
						}
					}
					if ($pushMissing)
					{
						$warnings['push'] = "PHP extension(s) '" . implode("', '", $pushMissing) . "' are required for push notifications support.";
					}

					try
					{
						$disabled = ini_get('disable_functions');
					}
					catch (Exception $e)
					{
						$errors['ini_get'] = 'Your server has disabled functions that make it impossible to detect server information. Other errors may occur.';
					}

					$required = array(
						'ini_set',
						'fpassthru',
					);

					$recommended = array(
						'fsockopen',
						'exec',
						'escapeshellarg',
						'proc_open',
						'popen',
						'set_time_out',
					);

					if (is_string($disabled))
					{
						$disabled = explode(',', $disabled);

						foreach ($disabled AS &$d)
						{
							$d = trim(strtolower($d));
						}

						foreach ($required AS $fn)
						{
							if (in_array($fn, $disabled))
							{
								$errors[$fn] = 'Your server has disabled a fundamental core PHP function <code><b>' . $fn . '</b></code> via the <code>disable_functions</code> directive in php.ini. This <b>will</b> cause unexpected problems in XenForo.';
							}
						}

						foreach ($recommended AS $fn)
						{
							if (in_array($fn, $disabled))
							{
								$warnings[$fn] = 'Your server has disabled a core PHP function <code><b>' . $fn . '</b></code> via the <code>disable_functions</code> directive in php.ini. This may cause unexpected problems in XenForo.';
							}
						}
					}

					if ($errors)
					{
						?>
						<div class="blockMessage blockMessage--error">
							<strong>Requirements not met</strong>
							<p>The following XenForo requirements were not met. Please contact your host for help.</p>
							<ol>
								<?php foreach ($errors AS $error) { echo "<li>$error</li>"; } ?>
							</ol>
							<?php
							if ($warnings)
							{
								?>
								<p>Additionally, the following warnings should be noted:</p>
								<ol>
									<?php foreach ($warnings AS $warning) { echo "<li>$warning</li>"; } ?>
								</ol>
								<?php
							}
							?>
						</div>
						<?php
					}
					else
					{
						?>
						<div class="blockMessage blockMessage--success">
							<strong>Requirements met</strong>
							<p>Your server meets all of XenForo's PHP requirements.</p>
							<?php
							if ($warnings)
							{
							?>
								<p>However, the following warnings should be noted - you may need to ask your host to address these:</p>
								<ol>
									<?php foreach ($warnings AS $warning) { echo "<li>$warning</li>"; } ?>
								</ol>
							<?php
							}
							?>
						</div>
						<?php
					}

					?>
					<div class="blockMessage">
						XenForo also requires MySQL 5.5 or newer. Please manually check that you meet this requirement.
					</div>
				</div>
			</div>
		</div>
	</div>
	<footer class="p-footer">
		<div class="p-footer-inner">
			<div class="p-footer-copyright">
				<a href="https://xenforo.com" class="u-concealed" dir="ltr" target="_blank" rel="sponsored noopener">Community platform by XenForo<sup>&reg;</sup> <span>&copy; 2010-<?php echo date('Y'); ?> XenForo Ltd.</span></a>
			</div>
		</div>
	</footer>
</div>
</body>
</html>
