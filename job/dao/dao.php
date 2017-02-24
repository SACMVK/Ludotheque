<?php

interface dao
{
	public Function create($object);
	public Function delete($object);
        public Function update($object);
        public Function find($request);
}


?>