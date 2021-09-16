<?php
	/**
	 * return how similar $str1 and $str2 are.
	 */
	public static function getStrMatching($str1, $str2) {
		$l1 = mb_strlen($str1, 'UTF-8');
		$l2 = mb_strlen($str2, 'UTF-8');
		if ( $l1 > $l2 ) {
			$long = $str1;
			$short = $str2;
			$size = $l2;
		} else {
			$long = $str2;
			$short = $str1;
			$size = $l1;
		}
		$exist_cnt = 0;

		$target = $long;
		$needle = $short;
		$search_len = 1;
		while(true) {
			if ( ($needle === "") or (mb_strlen($needle) < $search_len) ) {
				break;
			}
			$search = mb_substr($needle, 0, $search_len, 'UTF-8');
			$pos = mb_strpos($target, $search, 0, 'UTF-8');
			if ( $pos !== false ) {
				$exist_cnt++;
				$search_len++;
				$target = mb_substr($target, $pos, null, 'UTF-8');
			} else {
				if ( $search_len === 1 ) {
					$needle = mb_substr($needle, 1, null, 'UTF-8');
				} else {
					$needle = mb_substr($needle, $search_len-1, null, 'UTF-8');
					$target = mb_substr($target, $search_len-1, null, 'UTF-8');
					$search_len = 1;
				}
			}
		}

		return $exist_cnt / $size;
	}
