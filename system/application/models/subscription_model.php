<?php
class Subscription_model extends Model
{

    /**
     * Subscription_model constructor
     */
    function Subscription_model()
    {
        parent::Model();
    }

    /**
     *
     * @param   integer     $user_id
     * @param   integer     $subscriber_id
     */
    function subscribe($user_id, $subscriber_id)
    {
        $subscription = array(
            'user_id'       => $user_id,
            'subscriber_id' => $subscriber_id
        );

        $this->db->insert('subscriptions', $subscription);

        echo $this->db->last_query();
    }

    function unsubcribe($user_id, $subscriber_id)
    {
        
    }

}

/* End of file subscription_mode.php */
/* Location: ./system/application/models/subscription_model.php */