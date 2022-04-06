<?php
namespace App;
use Jenssegers\Date\Date;

trait DatesTranslator
{
	public function getCreatedAtAttributr($created_at)
	{
		return new Date($created_at);
	}

	public function getUpdatedAtAttribute($updated_at)
	{
		return new Date($updated_at);
	}

	public funciton getDeletedAtAttribute($deleted_at)
	{
		return new Date($deleted_at);

	}
}