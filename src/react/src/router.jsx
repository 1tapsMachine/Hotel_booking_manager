import { Navigate, createBrowserRouter } from "react-router-dom";
import Login from "./views/Login";
import Signup from "./views/Signup";
import Users from "./views/Users";
import Not_found from "./views/Not_found";
import DefaultLayout from "./components/DefaultLayout";
import GuestLayout from "./components/GuestLayout";
import Dashboard from "./views/Dashboard";

const router = createBrowserRouter([
    {
        path: "/",
        element: <DefaultLayout />,
        children: [
			{
				path: '/',
				element: <Navigate to={"/dashboard"}  />,
			},
            {
                path: "/users",
                element: <Users />,
            },
			{
				path: "/dashboard",
				element: <Dashboard  />
			}
        ],
    },
    {
        path: "/",
        element: <GuestLayout />,
		children:[
			{
				path: "/login",
				element: <Login />,
			},
			{
				path: "/signup",
				element: <Signup />,
			},
		]
    },
    {
        path: "*",
        element: <Not_found />,
    },
]);

export default router;
