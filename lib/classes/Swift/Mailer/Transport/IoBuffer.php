<?php

/*
 Input-output buffer interface from Swift Mailer.
 
 This program is free software: you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation, either version 3 of the License, or
 (at your option) any later version.
 
 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with this program.  If not, see <http://www.gnu.org/licenses/>.
 
 */

//@require 'Swift/InputByteStream.php';
//@require 'Swift/OutputByteStream.php';

/**
 * Buffers input and output to a resource.
 * @package Swift
 * @subpackage Transport
 * @author Chris Corbyn
 */
interface Swift_Mailer_Transport_IoBuffer
  extends Swift_InputByteStream, Swift_OutputByteStream
{
  
  /** A socket buffer over TCP */
  const TYPE_SOCKET = 0x0001;
  
  /** A process buffer with I/O support */
  const TYPE_PROCESS = 0x0010;
  
  /** A file buffer on disk */
  const TYPE_FILE = 0x0100;
  
  /**
   * Perform any initiation needed, using the given $params.
   * Parameters will vary depending upon the type of IoBuffer used.
   * @param array $params
   */
  public function initiate(array $params);
  
  /**
   * Perform any shutdown logic needed.
   */
  public function terminate();
  
  /**
   * Get a line of output (including any CRLF).
   * The $sequence number comes from any writes and may or may not be used
   * depending upon the implementation.
   * @param int $sequence of last write to scan from
   * @return string
   */
  public function readLine($sequence);
  
}