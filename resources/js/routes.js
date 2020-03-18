
import Dashboard from './pages/user/Dashboard';
import Task from './pages/user/Task'

export const routes  = [
    {
        path: '/dashboard',
        component: Dashboard,
    },
    {
        path: '/dashboard/task',
        component: Task,
    },

    {
        //should be at the last, if the route doesn't exist, it will display not found vue
        path: '/dashboard/*',
        component:  Dashboard
    },
];
