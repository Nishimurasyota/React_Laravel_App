import React from "react";
import {
  BrowserRouter,
  Routes,
  Route,
  Link
} from "react-router-dom";
import {TaskPage} from "./pages/tasks/index"
import {LoginPage} from "./pages/login/index"
import {HelpPage} from "./pages/help/index"

export const Router = () => {
    return (
        <BrowserRouter>
          <header className="global-head">
                <ul>
                <li><Link to="/">Home</Link></li>
                <li><Link to="/help">Help</Link></li>
                <li><Link to="/login">Login</Link></li>
                </ul>
            </header>
            <Routes>
                <Route index element={<TaskPage />} />
                <Route path="/help" element={<HelpPage />} />
                <Route path="/login" element={<LoginPage />} />
            </Routes>
        </BrowserRouter>
      );
}
