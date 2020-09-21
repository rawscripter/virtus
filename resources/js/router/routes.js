import DashboardLayout from "@pages/Dashboard/Layout/DashboardLayout.vue";
import AuthLayout from "@pages/Dashboard/Layout/AuthLayout.vue";
import MainLayout from "@pages/Dashboard/Layout/MainLayout";

// Dashboard pages
import Dashboard from "@pages/Dashboard/Dashboard.vue";
// Profile
import UserProfile from "@pages/Dashboard/Profile/UserProfile.vue";

// Admin Management
import ListUserPage from "@pages/Dashboard/Admin/UserManagement/ListUserPage.vue";
import BuyersListPage from "@pages/Dashboard/Admin/ListManagement/BuyersListPage.vue";
import CampaignListPage from "@pages/Dashboard/Admin/ListManagement/CampaignListPage.vue";


//Campaign
import CampaignPage from "@pages/Dashboard/Campaign/CampaignPage";
import CampaignContact from "@pages/Dashboard/Campaign/CampaignContact";
import AddCampaign from "@pages/Dashboard/Campaign/AddCampaign";
import CampaignContacts from "@pages/Dashboard/Campaign/Contacts";
import Leads from "@pages/Dashboard/Campaign/Leads";

// Pages
import RtlSupport from "@pages/Dashboard/Pages/RtlSupport.vue";
import Login from "@pages/Dashboard/Pages/Login.vue";
import Register from "@pages/Dashboard/Pages/Register.vue";
import Home from "@pages/Dashboard/Pages/Home.vue";



// Components pages
import Notifications from "@pages/Dashboard/Components/Notifications.vue";
import Icons from "@pages/Dashboard/Components/Icons.vue";
import Typography from "@pages/Dashboard/Components/Typography.vue";

// TableList pages
import RegularTables from "@pages/Dashboard/Tables/RegularTables.vue";

// Maps pages
import FullScreenMap from "@pages/Dashboard/Maps/FullScreenMap.vue";

//import middleware
import auth from "@/middleware/auth";
import guest from "@/middleware/guest";


let componentsMenu = {
    path: "/components",
    component: DashboardLayout,
    redirect: "/components/notification",
    name: "Components",
    children: [
        {
            path: "table",
            name: "Table",
            components: { default: RegularTables },
            meta: { middleware: auth }
        },
        {
            path: "typography",
            name: "Typography",
            components: { default: Typography },
            meta: { middleware: auth }
        },
        {
            path: "icons",
            name: "Icons",
            components: { default: Icons },
            meta: { middleware: auth }
        },
        {
            path: "maps",
            name: "Maps",
            meta: {
                hideContent: true,
                hideFooter: true,
                navbarAbsolute: true,
                middleware: auth
            },
            components: { default: FullScreenMap }
        },
        {
            path: "notifications",
            name: "Notifications",
            components: { default: Notifications },
            meta: { middleware: auth }
        },
        {
            path: "rtl",
            name: "وحة القيادة",
            meta: {
                rtlActive: true,
                middleware: auth
            },
            components: { default: RtlSupport }
        }
    ]
};

let userMenu = {
    path: "/profile",
    component: DashboardLayout,
    name: "Profile",
    children: [
        {
            path: "user-profile",
            name: "User Profile",
            components: { default: UserProfile },
            meta: { middleware: auth }
        },

    ]
};

let campaignMenu = {
    path: "/campaign",
    component: DashboardLayout,
    name: "Campaign",
    children: [
        {
            path: "campaign-list",
            name: "Campaign List",
            components: { default: CampaignPage },
            meta: { middleware: auth }
        },
        {
            path: "campaign-contact",
            name: "Campaign Contact",
            components: { default: CampaignContact },
            meta: { middleware: auth }
        },
        {
            path: "contacts",
            name: "Campaign Contacts",
            components: { default: CampaignContacts },
            meta: { middleware: auth }
        },

        {
            path: "add-campaign",
            name: "Add Campaign",
            components: { default: AddCampaign },
            meta: { middleware: auth }
        },


        {
            path: "leads",
            name: "Leads",
            components: { default: Leads },
            meta: { middleware: auth }
        },
    ]
};

let adminMenu = {
    path: "/admin",
    component: DashboardLayout,
    name: "Admin",
    children: [
        {
            path: "list-management/list-buyers",
            name: "List Buyers",
            components: { default: BuyersListPage },
            meta: { middleware: auth }
        },
        {
            path: "list-management/list-campaigns",
            name: "List Campaigns",
            components: { default: CampaignListPage },
            meta: { middleware: auth }
        },
        {
            path: "user-management/list-users",
            name: "List Users",
            components: { default: ListUserPage },
            meta: { middleware: auth }
        }
    ]
};


let authPages = {
    path: "/",
    component: AuthLayout,
    name: "Authentication",
    children: [
        {
            path: "/login",
            name: "Login",
            component: Login,
            meta: { middleware: guest }
        },
        {
            path: "/register",
            name: "Register",
            component: Register,
            meta: { middleware: guest }
        }
    ]
};

let mainpages = {
    path:"/",
    component: MainLayout,
    name: "Main",
    children:[
        {
            path: "/home",
            name: "Home Page",
            component: Home,
            meta: {middleware: guest}
        }
    ]
};
const routes = [
    {
        path: "/",
        redirect: "/dashboard",
        name: "Home"
    },
    {
        path: "/",
        component: DashboardLayout,
        meta: { middleware: auth },
        children: [
            {
                path: "dashboard",
                name: "Dashboard",
                components: { default: Dashboard },
                meta: { middleware: auth }
            }
        ]
    },
    componentsMenu,
    userMenu,
    adminMenu,
    authPages,
    mainpages,
    campaignMenu
];

export default routes;
