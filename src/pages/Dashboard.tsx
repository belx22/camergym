import React from 'react';
import { Users, Medal, Award, ClipboardList } from 'lucide-react';
import { Link } from 'react-router-dom';

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

export default function Dashboard() {
  return (
    <div>
      <h1 className="text-3xl font-bold text-gray-800 mb-8">
        Dashboard
      </h1>
      
      <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <DashboardCard 
          icon={Users} 
          title="Total Members" 
          count={156} 
          link="/members" 
        />
        <DashboardCard 
          icon={Medal} 
          title="Active Clubs" 
          count={12} 
          link="/clubs" 
        />
        <DashboardCard 
          icon={Award} 
          title="Gymnasts" 
          count={89} 
          link="/gymnasts" 
        />
        <DashboardCard 
          icon={ClipboardList} 
          title="Pending Approvals" 
          count={5} 
          link="/approvals" 
        />
      </div>

      <div className="mt-8 grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div className="bg-white p-6 rounded-lg shadow-md">
          <h2 className="text-xl font-semibold mb-4">Recent Activities</h2>
          <div className="space-y-4">
            {/* Activity items would be mapped here */}
            <div className="flex items-center space-x-3 text-sm">
              <div className="w-2 h-2 bg-green-500 rounded-full"></div>
              <p>New member registration: <span className="font-medium">John Doe</span></p>
            </div>
          </div>
        </div>

        <div className="bg-white p-6 rounded-lg shadow-md">
          <h2 className="text-xl font-semibold mb-4">Upcoming Events</h2>
          <div className="space-y-4">
            {/* Events would be mapped here */}
            <div className="border-l-4 border-blue-500 pl-4">
              <p className="font-medium">National Championship</p>
              <p className="text-sm text-gray-500">March 15, 2024</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}