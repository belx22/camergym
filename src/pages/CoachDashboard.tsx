import React from 'react';
import { Users, Medal, Award } from 'lucide-react';
import { Link } from 'react-router-dom';
import { useAuth } from '../context/AuthContext';

const DashboardCard = ({ icon: Icon, title, count, link }: { icon: any, title: string, count: number, link: string }) => (
  <Link to={link} className="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow">
    <div className="flex items-center justify-between">
      <div>
        <p className="text-gray-500 text-sm">{title}</p>
        <p className="text-2xl font-bold mt-1">{count}</p>
      </div>
      <Icon className="h-8 w-8 text-blue-500" />
    </div>
  </Link>
);

export default function CoachDashboard() {
  const { user } = useAuth();

  return (
    <div>
      <div className="mb-8">
        <h1 className="text-3xl font-bold text-gray-800">Coach Dashboard</h1>
        <p className="text-gray-600 mt-2">Welcome back, {user?.firstName} {user?.lastName}</p>
      </div>
      
      <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
        <DashboardCard 
          icon={Users} 
          title="My Gymnasts" 
          count={12} 
          link="/coach/gymnasts" 
        />
        <DashboardCard 
          icon={Medal} 
          title="Active Programs" 
          count={3} 
          link="/coach/programs" 
        />
        <DashboardCard 
          icon={Award} 
          title="Upcoming Events" 
          count={2} 
          link="/coach/events" 
        />
      </div>

      <div className="mt-8 grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div className="bg-white p-6 rounded-lg shadow-md">
          <h2 className="text-xl font-semibold mb-4">My Gymnasts</h2>
          <div className="space-y-4">
            {[
              { name: 'Alice Smith', age: 12, level: 'Junior' },
              { name: 'Bob Johnson', age: 14, level: 'Intermediate' },
              { name: 'Carol Williams', age: 13, level: 'Junior' },
            ].map((gymnast, index) => (
              <div key={index} className="flex items-center justify-between border-b pb-2">
                <div>
                  <p className="font-medium">{gymnast.name}</p>
                  <p className="text-sm text-gray-500">Age: {gymnast.age} | Level: {gymnast.level}</p>
                </div>
                <Link to={`/coach/gymnasts/${index}`} className="text-blue-600 hover:text-blue-800 text-sm">
                  View Details
                </Link>
              </div>
            ))}
          </div>
        </div>

        <div className="bg-white p-6 rounded-lg shadow-md">
          <h2 className="text-xl font-semibold mb-4">Upcoming Training Sessions</h2>
          <div className="space-y-4">
            <div className="border-l-4 border-blue-500 pl-4">
              <p className="font-medium">Junior Group Training</p>
              <p className="text-sm text-gray-500">Today, 2:00 PM - 4:00 PM</p>
            </div>
            <div className="border-l-4 border-green-500 pl-4">
              <p className="font-medium">Individual Practice - Alice Smith</p>
              <p className="text-sm text-gray-500">Tomorrow, 10:00 AM - 11:30 AM</p>
            </div>
            <div className="border-l-4 border-purple-500 pl-4">
              <p className="font-medium">Competition Preparation</p>
              <p className="text-sm text-gray-500">March 15, 1:00 PM - 3:00 PM</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}