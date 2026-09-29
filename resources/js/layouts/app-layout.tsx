import AppLayoutTemplate from '@/layouts/app/app-sidebar-layout';
import { TooltipProvider } from '@/components/ui/tooltip';
import type { BreadcrumbItem } from '@/types';

export default function AppLayout({
    breadcrumbs = [],
    children,
}: {
    breadcrumbs?: BreadcrumbItem[];
    children: React.ReactNode;
}) {
    return (
        <TooltipProvider delayDuration={0}>
            <AppLayoutTemplate breadcrumbs={breadcrumbs}>
                {children}
            </AppLayoutTemplate>
        </TooltipProvider>
    );
}
