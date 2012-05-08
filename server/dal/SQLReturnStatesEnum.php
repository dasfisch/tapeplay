<?php

namespace tapeplay\server\dal;

class SQLReturnStates
{
	public static $SUCCESS = "00";
	public static $WARNING = "01";
	public static $NO_DATA = "02";
	public static $DYN_SQL_ERR = "07";
	public static $CONN_EXC = "08";
	public static $FEATURE_NOT_SUPPORTED = "0A";
	public static $CARDINALITY_VIOLATION = "21";
	public static $DATA_EXC = "22";
	public static $INTEGRITY_CONSTRAINT_VIOLATION = "23";
	public static $INVALID_CURSOR_STATE = "24";
	public static $INVALID_TRANSACTION_STATE = "25";
	public static $INVALID_SQL_STATEMENT_NAME = "26";
	public static $TRIGGERED_DATA_CHANGE = "01";
	public static $INVALID_CONNECTION_NAME = "2E";
	public static $INVALID_SQL_DESCRIPTOR = "33";
	public static $INVALID_CURSOR_NAME = "34";
	public static $INVALID_CONDITION_NUMBER = "35";
	public static $SYNTAX_ERROR = "37";
	public static $AMBIGUOUS_CURSOR_NAME = "3C";
	public static $INVALID_SCHEMA_NAME = "3F";
	public static $TRANSACTION_ROLLBACK = "40";
	public static $WITH_CHECK_OPTION_VIOLATION = "44";

}
