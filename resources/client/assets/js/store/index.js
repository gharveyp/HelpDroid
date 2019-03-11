import Vue from 'vue'
import Vuex from 'vuex'
import Alert from './modules/alert'
import ChangePassword from './modules/change_password'
import Rules from './modules/rules'
import SafezonesIndex from './modules/Safezones'
import SafezonesSingle from './modules/Safezones/single'
import BroadcastsIndex from './modules/Broadcasts'
import BroadcastsSingle from './modules/Broadcasts/single'
import PermissionsIndex from './modules/Permissions'
import PermissionsSingle from './modules/Permissions/single'
import RolesIndex from './modules/Roles'
import RolesSingle from './modules/Roles/single'
import UsersIndex from './modules/Users'
import UsersSingle from './modules/Users/single'
import * as VueGoogleMaps from "vue2-google-maps"

Vue.use(Vuex)

const debug = process.env.NODE_ENV !== 'production'

Vue.use(VueGoogleMaps, {
    load: {
        key: "AIzaSyCwtik-Vh94t9CrBPOH1l5woCC9tPLhYOI",
        libraries: "places" // necessary for places input
    }
});

export default new Vuex.Store({
    modules: {
        Alert,
        ChangePassword,
        Rules,
        SafezonesIndex,
        SafezonesSingle,
        BroadcastsIndex,
        BroadcastsSingle,
        PermissionsIndex,
        PermissionsSingle,
        RolesIndex,
        RolesSingle,
        UsersIndex,
        UsersSingle,
    },
    strict: debug,
})
