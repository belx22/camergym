import React from 'react';
import { Link } from 'react-router-dom';
import { Dumbbell, Users, Medal, LogOut } from 'lucide-react';
import { useAuth } from '../context/AuthContext';

export default function Navbar() {
  const { user, logout } = useAuth();

  return (
    <nav className="bg-blue-600 text-white shadow-lg">
      <div className="container mx-auto px-4">
        <div className="flex items-center justify-between h-16">
          <Link to={user?.role === 'admin' ? '/admin' : '/coach'} className="flex items-center space-x-2">
            <Dumbbell className="h-8 w-8" />
            <span className="font-bold text-xl">FCG Admin</span>
          </Link>
          
          <div className="flex items-center space-x-8">
            {user?.role === 'admin' ? (
              <>
                <Link to="/admin/members" className="flex items-center space-x-1 hover:text-blue-200">
                  <Users className="h-5 w-5" />
                  <span>Members</span>
                </Link>
                <Link to="/admin/clubs" className="flex items-center space-x-1 hover:text-blue-200">
                  <Medal className="h-5 w-5" />
                  <span>Clubs</span>
                </Link>
              </>
            ) : (
              <>
                <Link to="/coach/gymnasts" className="flex items-center space-x-1 hover:text-blue-200">
                  <Users className="h-5 w-5" />
                  <span>My Gymnasts</span>
                </Link>
                <Link to="/coach/programs" className="flex items-center space-x-1 hover:text-blue-200">
                  <Medal className="h-5 w-5" />
                  <span>Programs</span>
                </Link>
              </>
            )}
            
            <button
              onClick={logout}
              className="flex items-center space-x-1 hover:text-blue-200"
            >
              <LogOut className="h-5 w-5" />
              <span>Logout</span>
            </button>
          </div>
        </div>
      </div>
    </nav>
  );
}