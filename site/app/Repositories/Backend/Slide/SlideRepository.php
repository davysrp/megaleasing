<?php

namespace App\Repositories\Backend\Slide;

use DB;
use Carbon\Carbon;
use App\Models\Slide\Slide;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SlideRepository.
 */
class SlideRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Slide::class;

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->select([
                config('module.slides.table').'.id',
                config('module.slides.table').'.title',
                config('module.slides.table').'.created_at',
                config('module.slides.table').'.updated_at',
            ]);
    }

    /**
     * For Creating the respective model in storage
     *
     * @param array $input
     * @throws GeneralException
     * @return bool
     */
    public function create(array $input)
    {
        if (Slide::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.slides.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Slide $slide
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Slide $slide, array $input)
    {
    	if ($slide->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.slides.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Slide $slide
     * @throws GeneralException
     * @return bool
     */
    public function delete(Slide $slide)
    {
        if ($slide->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.slides.delete_error'));
    }
}
