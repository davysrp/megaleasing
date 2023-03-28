<?php

namespace App\Repositories\Backend\Subscriber;

use DB;
use Carbon\Carbon;
use App\Models\Subscriber\Subscriber;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Model;

/**
 * Class SubscriberRepository.
 */
class SubscriberRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Subscriber::class;

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
                config('module.subscribers.table').'.id',
                config('module.subscribers.table').'.created_at',
                config('module.subscribers.table').'.updated_at',
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
        if (Subscriber::create($input)) {
            return true;
        }
        throw new GeneralException(trans('exceptions.backend.subscribers.create_error'));
    }

    /**
     * For updating the respective Model in storage
     *
     * @param Subscriber $subscriber
     * @param  $input
     * @throws GeneralException
     * return bool
     */
    public function update(Subscriber $subscriber, array $input)
    {
    	if ($subscriber->update($input))
            return true;

        throw new GeneralException(trans('exceptions.backend.subscribers.update_error'));
    }

    /**
     * For deleting the respective model from storage
     *
     * @param Subscriber $subscriber
     * @throws GeneralException
     * @return bool
     */
    public function delete(Subscriber $subscriber)
    {
        if ($subscriber->delete()) {
            return true;
        }

        throw new GeneralException(trans('exceptions.backend.subscribers.delete_error'));
    }
}
