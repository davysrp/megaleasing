<?php

namespace App\Repositories\Backend\PageMenu;

use DB;
use Carbon\Carbon;
use App\Models\PageMenu\PageMenu;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class PageMenuRepository.
 */
class PageMenuRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = PageMenu::class;

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
                config('module.pagemenus.table').'.id',
                config('module.pagemenus.table').'.title',
                config('module.pagemenus.table').'.created_at',
                config('module.pagemenus.table').'.updated_at',
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
        if (PageMenu::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.pagemenus.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param PageMenu $pagemenu
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(PageMenu $pagemenu, array $input)
    {
    	if ($pagemenu->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.pagemenus.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param PageMenu $pagemenu
     * @throws GeneralException
     * @return bool
     */
    public function delete(PageMenu $pagemenu)
    {
        if ($pagemenu->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.pagemenus.delete_error'));
    }
}
