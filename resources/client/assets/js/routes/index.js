import Vue from 'vue'
import VueRouter from 'vue-router'

import ChangePassword from '../components/ChangePassword.vue'
import AroundYousIndex from '../components/cruds/AroundYous/Index.vue'
import SafezonesIndex from '../components/cruds/Safezones/Index.vue'
import SafezonesCreate from '../components/cruds/Safezones/Create.vue'
import SafezonesShow from '../components/cruds/Safezones/Show.vue'
import SafezonesEdit from '../components/cruds/Safezones/Edit.vue'
import BroadcastsIndex from '../components/cruds/Broadcasts/Index.vue'
import BroadcastsCreate from '../components/cruds/Broadcasts/Create.vue'
import BroadcastsShow from '../components/cruds/Broadcasts/Show.vue'
import BroadcastsEdit from '../components/cruds/Broadcasts/Edit.vue'
import PermissionsIndex from '../components/cruds/Permissions/Index.vue'
import PermissionsCreate from '../components/cruds/Permissions/Create.vue'
import PermissionsShow from '../components/cruds/Permissions/Show.vue'
import PermissionsEdit from '../components/cruds/Permissions/Edit.vue'
import RolesIndex from '../components/cruds/Roles/Index.vue'
import RolesCreate from '../components/cruds/Roles/Create.vue'
import RolesShow from '../components/cruds/Roles/Show.vue'
import RolesEdit from '../components/cruds/Roles/Edit.vue'
import UsersIndex from '../components/cruds/Users/Index.vue'
import UsersCreate from '../components/cruds/Users/Create.vue'
import UsersShow from '../components/cruds/Users/Show.vue'
import UsersEdit from '../components/cruds/Users/Edit.vue'
import HelpsIndex from '../components/cruds/Helps/Index.vue'

Vue.use(VueRouter)

const routes = [
    { path: '/change-password', component: ChangePassword, name: 'auth.change_password' },
    { path: '/around-yous', component: AroundYousIndex, name: 'around_yous.index' },
    { path: '/safezones', component: SafezonesIndex, name: 'safezones.index' },
    { path: '/safezones/create', component: SafezonesCreate, name: 'safezones.create' },
    { path: '/safezones/:id', component: SafezonesShow, name: 'safezones.show' },
    { path: '/safezones/:id/edit', component: SafezonesEdit, name: 'safezones.edit' },
    { path: '/broadcasts', component: BroadcastsIndex, name: 'broadcasts.index' },
    { path: '/broadcasts/create', component: BroadcastsCreate, name: 'broadcasts.create' },
    { path: '/broadcasts/:id', component: BroadcastsShow, name: 'broadcasts.show' },
    { path: '/broadcasts/:id/edit', component: BroadcastsEdit, name: 'broadcasts.edit' },
    { path: '/permissions', component: PermissionsIndex, name: 'permissions.index' },
    { path: '/permissions/create', component: PermissionsCreate, name: 'permissions.create' },
    { path: '/permissions/:id', component: PermissionsShow, name: 'permissions.show' },
    { path: '/permissions/:id/edit', component: PermissionsEdit, name: 'permissions.edit' },
    { path: '/roles', component: RolesIndex, name: 'roles.index' },
    { path: '/roles/create', component: RolesCreate, name: 'roles.create' },
    { path: '/roles/:id', component: RolesShow, name: 'roles.show' },
    { path: '/roles/:id/edit', component: RolesEdit, name: 'roles.edit' },
    { path: '/users', component: UsersIndex, name: 'users.index' },
    { path: '/users/create', component: UsersCreate, name: 'users.create' },
    { path: '/users/:id', component: UsersShow, name: 'users.show' },
    { path: '/users/:id/edit', component: UsersEdit, name: 'users.edit' },
    { path: '/helps', component: HelpsIndex, name: 'helps.index' },
]

export default new VueRouter({
    mode: 'history',
    base: '/admin',
    routes
})
