# Dev Log

```php
public function call_back_for_organization_field() {
    // Get current wp user
    if( in_array( ['administrator', 'super-admin'], $current_user->roles ) {
        //return all organizations
    }

    $users_orgs = $current_user->get( 'organization_names' );
    // These are the ITThinx Group names of the orgs
    // that the current user has.
    // They should be returned as the options for the
    // user whose profile is being edited or
    // who is being registered.
    return $users_orgs;
}
public function call_back_for_pharmacies_field() {
    // Get wp current user
    if( in_array( ['administrator', 'super-admin'], $current_user->roles ) {
        //return all pharmacies
    }

    $users_pharmacies = $current_user->get( 'pharmacy_names' );
    if( ! empty( $users_pharmacies ) ) {
        // These are the ITThinx group names of the
        // pharmacies to which the Org_owner (or whomever)
        // has access, so they should be returned when
        // he/she is editing a profile or
        // registering a user (pharmacy_manager etc )
        return $users_pharmacies;
    }

    // We only get here if the Org_Owner, for example does not have
    // any pharmacies explicitly in "pharmacy_names"

    // Now we can make use of the organization call back function
    // to return the organizations for which we should get the pharmacies
    $user_orgs = call_back_for_organization_field();
    $user_pharmacies = array();
    foreach( $user_orgs as $organization ) {
        $my_org_group = Groups_Group::read_by_name( $organization );
        $my_org_group_id = $my_org_group->group_id;
        $this_org_pharmacies = Groups_Group::get_groups( array( 'parent_id' => my_org_group_id ) );
        //Merge user_pharmacies array with $this_org_pharmacies
    }
    //Just need the group->name so modify array to only have names
    $user_pharmacy_names = //filter user_pharmacies for just group->names;

    // These are the ITThinx Group names of the pharmacies
    // to which the current user has access through their org(s).
    // They should be returned as the pharmacy options for the
    // user whose profile is being edited or
    // who is being registered.
    return $user_pharmacy_names;
}
```
