<?php

interface dao
{
	public Function insert($object);
	public Function delete($object);
        public Function alter($object);
        public Function select($request);
}


?>