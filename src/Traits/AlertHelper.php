<?php

namespace PropaySystems\Utilities\Traits;

use WireUi\Traits\Actions;

trait AlertHelper
{
    use Actions;

    /**
     * @param  null  $text
     * @param  string  $iconColor
     */
    public function alert($title, $text = null, string $type = 'success', $iconColor = 'text-green-500'): void
    {
        $this->notification()->send([
            'title' => $title,
            'description' => $text,
            'icon' => $type,
            'iconColor' => $iconColor,
        ]);
    }

    public function alertCreated(): void
    {
        $this->notification()->success(
            trans('custom/actions.created'),
            trans('custom/general.messages.created')
        );
    }

    public function alertUpdated(): void
    {
        $this->notification()->success(
            trans('custom/actions.updated'),
            trans('custom/general.messages.updated')
        );
    }

    public function alertSentSMS(): void
    {
        $this->notification()->success(
            trans('custom/actions.sent'),
            trans('custom/general.messages.sms_sent')
        );
    }

    public function alertDeleted(): void
    {
        $this->notification()->error(
            trans('custom/actions.deleted'),
            trans('custom/general.messages.deleted')
        );
    }

    /**
     * @param  string  $errorMessage
     */
    public function alertError($errorMessage = ''): void
    {
        $this->notification()->error(
            trans('custom/actions.error'),
            $errorMessage
        );
    }

    public function alertRefresh(): void
    {
        $this->notification()->send([
            'title' => trans('custom/actions.refresh'),
            'description' => trans('custom/general.messages.refreshed'),
            'icon' => 'refresh',
            'iconColor' => 'text-blue-500',
        ]);
    }

    /**
     * @param  null  $cancelMethod
     * @param  string  $type
     */
    public function confirm($method, array $params = [], $title = null, $text = null, $cancelMethod = null, array $cancelParams = [], $type = 'question'): void
    {
        $this->notification()->confirm([
            'title' => (is_null($title) ? trans('custom/general.are_you_sure') : $title),
            'description' => (is_null($text) ? trans('custom/general.unable_to_revert') : $text),
            'icon' => $type,
            'iconColor' => 'text-blue-400',
            'accept' => [
                'label' => trans('custom/tasks.accept_message_confirm'),
                'method' => $method,
                'params' => $params,
            ],
            'reject' => [
                'label' => trans('custom/actions.no').', '.trans('custom/actions.cancel'),
                'method' => $cancelMethod,
                'params' => $cancelParams,
            ],
        ]);
    }

    /**
     * @param  array  $params
     * @param  null  $cancelMethod
     * @param  array  $cancelParams
     */
    public function confirmDelete($method, $params = [], $cancelMethod = null, $cancelParams = []): void
    {
        $this->notification()->confirm([
            'title' => trans('custom/general.are_you_sure'),
            'description' => trans('custom/general.unable_to_revert'),
            'icon' => 'question',
            'iconColor' => 'text-yellow-400',
            'accept' => [
                'label' => trans('custom/actions.yes').', '.trans('custom/actions.delete').'!',
                'method' => $method,
                'params' => $params,
            ],
            'reject' => [
                'label' => trans('custom/actions.no').', '.trans('custom/actions.cancel'),
                'method' => $cancelMethod,
                'params' => $cancelParams,
            ],
        ]);
    }

    /**
     * @param  array  $params
     * @param  null  $cancelMethod
     * @param  array  $cancelParams
     */
    public function confirmAction($method, $params = [], $cancelMethod = null, $cancelParams = []): void
    {
        $this->notification()->confirm([
            'title' => trans('custom/general.are_you_sure'),
            'description' => trans('custom/general.confirm_action'),
            'icon' => 'question',
            'iconColor' => 'text-blue-400',
            'accept' => [
                'label' => trans('custom/actions.yes').', '.trans('jsvalidation.general.proceed').'!',
                'method' => $method,
                'params' => $params,
            ],
            'reject' => [
                'label' => trans('custom/actions.no').', '.trans('custom/actions.cancel'),
                'method' => $cancelMethod,
                'params' => $cancelParams,
            ],
        ]);
    }
}
